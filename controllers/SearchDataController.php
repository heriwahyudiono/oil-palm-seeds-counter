<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Data</title>
</head>
<body>
  <div id="oil_body_wrap" class="oil_header_padding oil_second" style="min-height: unset !important">
    <div id="table-container">
      <?php
      require_once '../models/DataModel.php';

      if (isset($_POST['blok_ke'])) {
        $blok_ke = $_POST['blok_ke'];
        $model = new DataModel();
        $data = $model->getDataByBlock($blok_ke);

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
              echo "<th>Tanggal Hitung</th>";
              echo "<th>Keterangan</th>";
              echo "<th>Action</th>";
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
                echo "<td>" . formatDate($currentRow['tanggal_hitung']) . "</td>";
                echo "<td>" . $currentRow['keterangan'] . "</td>";
                echo "<td class='action-buttons'>
            <a href='./hitung-ulang.php'>Hitung Ulang</a>
            <button onclick='confirmDelete(" . $currentRow['id'] . ")'>Delete</button>
          </td>";
                echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";
              $currentRows = array();
            }
          }
        } else {
          echo "<p>Tidak ada data untuk blok ini</p>";
        }
      }

      function formatDate($date)
      {
        return date('d-m-Y', strtotime($date));
      }

      $model->closeConnection();
      ?>
    </div>
  </div>
</body>
</html>