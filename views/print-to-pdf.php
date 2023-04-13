<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print to PDF</title>
</head>
<body>
    
    <?php

    require_once __DIR__ . '/../vendor/autoload.php';

    use Dompdf\Dompdf;

    function formatDate($date)
    {
        return date('d-m-Y', strtotime($date));
    }

    require_once '../models/DataModel.php';
    $model = new DataModel();
    $data = $model->getData();

    ob_start();
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
                        echo "<td style='text-align: left; padding: 8px; border-bottom: 1px solid #ddd;'>" . $currentRow['baris_ke'] . "</td>";
                        echo "<td style='text-align: left; padding: 8px; border-bottom: 1px solid #ddd;'>" . $currentRow['jumlah'] . "</td>";
                        echo "<td style='text-align: left; padding: 8px; border-bottom: 1px solid #ddd;'>" . formatDate($currentRow['tanggal_penghitungan']) . "</td>";
                        echo "<td style='text-align: left; padding: 8px; border-bottom: 1px solid #ddd;'>" . $currentRow['keterangan'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                }

                echo "
                    <div>
                        <div>
                            <img style='width: 10px; height: 10px' src='../assets/images/ptpn6.png' alt=''>
                            <h2 style='display: flex'>PTPN 6 Unit Usaha Durian Luncuk</h2>
                        </div>
                        <h3>Data Jumlah Bibit Kelapa Sawit di Pembibitan Main Nursery</h3>
                        <hr>
                    </div>            
                ";

                echo "<h3>Blok ke- " . $currentBlok . "</h3>";
                echo "<table style='border-collapse: collapse; width: 100%;'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th style='text-align: left; padding: 8px; border-bottom: 1px solid #ddd;'>Baris ke</th>";
                echo "<th style='text-align: left; padding: 8px; border-bottom: 1px solid #ddd;'>Jumlah</th>";
                echo "<th style='text-align: left; padding: 8px; border-bottom: 1px solid #ddd;'>Tanggal Penghitungan</th>";
                echo "<th style='text-align: left; padding: 8px; border-bottom: 1px solid #ddd;'>Keterangan</th>";
                echo "</tr>";
                echo "</thead>";
            }

            $currentRows[] = $row;

            if ($row == end($data) || $row['blok_ke'] != $data[array_search($row, $data) + 1]['blok_ke']) {
                echo "<tbody>";
                foreach ($currentRows as $currentRow) {
                    echo "<tr>";
                    echo "<td style='text-align: left; padding: 8px; border-bottom: 1px solid #ddd;'>" . $currentRow['baris_ke'] . "</td>";
                    echo "<td style='text-align: left; padding: 8px; border-bottom: 1px solid #ddd;'>" . $currentRow['jumlah'] . "</td>";
                    echo "<td style='text-align: left; padding: 8px; border-bottom: 1px solid #ddd;'>" . formatDate($currentRow['tanggal_penghitungan']) . "</td>";
                    echo "<td style='text-align: left; padding: 8px; border-bottom: 1px solid #ddd;'>" . $currentRow['keterangan'] . "</td>";
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

    $html = ob_get_clean();

    $dompdf = new Dompdf();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    ob_end_clean();

    $dompdf->stream("data.pdf", array("Attachment" => false));

    ?>

</body>
</html>