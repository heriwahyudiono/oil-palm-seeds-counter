<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/x-icon" href="../assets/images/ptpn6.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
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
  <div id="oil_body_wrap" class="oil_header_padding oil_second" style="min-height: unset !important">
    <div class="oil_header oil_wrap_header_menu">
      <a href="./hitung.php" style="display: inline-flex !important"><img src="../assets/images/img_icon_back.svg">Kembali</a>
    </div>
    <div class="oil_content oil_bg_leaf">
      <div>
        <h2>Daftar Hasil
          <br>
          <span>Hitung</span>
        </h2>
        <div class="oil_d_column" style="gap: 8px">
          <div>
            <a class="btn oil_btn_icon_small oil_green" href="./print-to-pdf.php"><img src="../assets/images/img_icon_print.svg">Cetak PDF</a>
          </div>
          <div>
            <a class="btn oil_btn_icon_small" href="./hitung.php"><img src="../assets/images/img_icon_refresh.svg">Hitung lagi</a>
          </div>
        </div>
        <label for="" style="margin-top: 44px; margin-bottom: 8px; display: block; font-family: Mate; font-size: 20px; font-weight: 400; line-height: 24px; letter-spacing: 0.04em; text-align: left;">Cari Data Berdasarkan Blok</label>
        <form id="search-form">
          <input type="text" id="search-input" placeholder="Ketik blok yang dicari...">
          <input type="submit" value="Cari" class="btn">
        </form>
        <div style="height: 16px"></div>
      </div>
    </div>

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
    
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
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

      function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
          window.location.href = "../controllers/DeleteDataController.php?id=" + id;
        }
      }
    </script>
</body>
</html>