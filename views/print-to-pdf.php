<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Print to PDF</title>
</head>
<body style="background: #F4F4F4">

    <?php

    require_once '../vendor/autoload.php';

    use Dompdf\Dompdf;

    function formatDate($date)
    {
        return date('d-m-Y', strtotime($date));
    }

    require_once '../models/DataModel.php';
    $model = new DataModel();
    $data = $model->getData();

    ob_start();

    $image = file_get_contents("../assets/images/ptpn6.png");
    $imagedata = base64_encode($image);

    echo "
        <div>
            <div>
                <img style='margin-right: 80px; display: inline-block; width: 70px; float: left; margin-right: 10px; margin-top: 16px;' src='data:image/png;base64, $imagedata' alt=''>
                <h1 style='font-family: 'CrimsonPro';
                font-size: 55px;
                font-weight: 700;
                line-height: 48px;
                letter-spacing: 0em;
                text-align: left;
                '>PTPN 6 Unit Usaha Durian Luncuk</h1>
                <h4 style='opacity: 0.88; 
                font-weight: 500;'>Data Jumlah Bibit Kelapa Sawit di Pembibitan Main Nursery</h4>
            </div>
            <div style='
                width: 100%;
                height: 8px;
                background: #789940;
                border-bottom: 2px solid #EC6B0F;
                margin-bottom: 40px
            '>
            </div>
        </div>                              
    ";

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
                
                echo "<h3 style='color:#789940; text-transform: uppercase; margin-bottom: 0px; padding-left:8px; padding-top: 8px; padding-bottom: 8px'>Blok ke- <span style='color: #EC6B0F;'>" . $currentBlok . "</span></h3>";
                echo "<table style='border-collapse: collapse; width: 100%; margin-bottom: 40px'>";
                echo "<thead style='background: #F4F4F4'>";
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

    $dompdf->stream("jumlah-bibit.pdf", array("Attachment" => false));

    ?>

</body>
</html>