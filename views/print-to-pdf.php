<?php
require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = file_get_contents('http://localhost/oil-palm-seeds-counter/views/data.php');
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("output.pdf", array("Attachment" => false));
