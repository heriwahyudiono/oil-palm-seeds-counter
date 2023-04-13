<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
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

    .action-buttons {
      display: flex;
    }

    .action-buttons a {
      margin-right: 5px;
      text-decoration: none;
      color: black;
      padding: 5px 10px;
      border: 1px solid black;
      border-radius: 3px;
    }
  </style>
</head>
<body>

  <a href="./print-to-pdf.php">Cetak menjadi PDF</a><br>
  <a href="./hitung.php">Hitung lagi</a><br>
  <a href="./hitung.php">Kembali</a>

  <form id="search-form">
    <input type="text" id="search-input" placeholder="Cari data berdasarkan blok">
    <input type="submit" value="Cari">
  </form>

  <div id="table-container">
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
              echo "<td class='action-buttons'><a href='./hitung-ulang.php'>Hitung Ulang</a></td>";
              echo "<td class='action-buttons'><a href='../controllers/DeleteDataController.php?id=" . $currentRow['id'] . "'>Delete</a></td>";
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
            echo "<td>" . formatDate($currentRow['tanggal_penghitungan']) . "</td>";
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
      echo "<p>Belum ada data</p>";
    }
    ?>
  </div>

  <script>
    function confirmDelete(id) {
      if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        window.location.href = "../controllers/DeleteDataController.php?id=" + id;
      }
    }

    function generatePdf() {
      // buat objek doc
      const doc = new jsPDF();

      // ambil elemen yang akan dicetak
      const elementToPrint = document.getElementById("table-container");

      // buat canvas dari elemen tersebut
      html2canvas(elementToPrint).then(function(canvas) {
        // konversi canvas menjadi gambar PNG
        const imgData = canvas.toDataURL("image/png");

        // tambahkan gambar ke dokumen PDF
        doc.addImage(imgData, "PNG", 10, 10, 190, 280);

        // simpan file PDF
        doc.save("data.pdf");
      });
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#search-form').submit(function(event) {
        event.preventDefault();
        var blok_ke = $('#search-input').val();
        $.ajax({
          url: '../controllers/SearchDataController.php',
          type: 'POST',
          data: {
            blok_ke: blok_ke
          },
          success: function(response) {
            $('tbody').remove();
            $('h3').remove();
            $('table').remove();
            $('body').append(response);
          }
        });
      });
    });
  </script>
</body>
</html>