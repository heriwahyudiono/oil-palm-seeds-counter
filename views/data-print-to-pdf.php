<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Jumlah</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }
  </style>
</head>
<body>

  <?php
  function formatDate($date)
  {
    return date('d-m-Y', strtotime($date));
  }

  require_once '../models/DataModel.php';
  $model = new DataModel();
  $data = $model->getData();

  if ($data) {

    usort($data, function ($a, $b) {
      if ($a['blok_ke'] == $b['blok_ke']) {
        return $a['baris_ke'] - $b['baris_ke'];
      } else {
        return $a['blok_ke'] - $b['blok_ke'];
      }
    });

    $currentBlok = null;
    $currentRows = array();
    foreach ($data as $row) {
      if ($row['blok_ke'] != $currentBlok) {
        $currentBlok = $row['blok_ke'];

        if (!empty($currentRows)) {
          echo "<tbody>";
          foreach ($currentRows as $currentRow) {
            echo "<tr>";
            echo "<td>" . $currentRow['baris_ke'] . "</td>";
            echo "<td>" . $currentRow['jumlah'] . "</td>";
            echo "<td>" . formatDate($currentRow['tanggal_penghitungan']) . "</td>";
            echo "<td>" . $currentRow['keterangan'] . "</td>";
            echo "</tr>";
          }
          echo "</tbody>";
          echo "</table>";
          $currentRows = array();
        }

        echo "<h3>Blok ke-" . $currentBlok . "</h3>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Baris ke</th>";
        echo "<th>Jumlah</th>";
        echo "<th>Tanggal Penghitungan</th>";
        echo "<th>Keterangan</th>";
        echo "</tr>";
        echo "</thead>";
      }

      $currentRows[] = $row;

      if ($row == end($data) || $row['blok_ke'] != $data[array_search($row, $data) + 1]['blok_ke']) {
        echo "<tbody>";
        foreach ($currentRows as $currentRow) {
          echo "<tr>";
          echo "<td>" . $currentRow['baris_ke'] . "</td>";
          echo "<td>" . $currentRow['jumlah'] . "</td>";
          echo "<td>" . formatDate($currentRow['tanggal_penghitungan']) . "</td>";
          echo "<td>" . $currentRow['keterangan'] . "</td>";
          echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        $currentRows = array();
      }
    }
  } else {
    echo "<p>Belum ada data</p>";
  }
  ?>

</body>
</html>