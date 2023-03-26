<?php
require_once '../models/DataModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blok_ke = $_POST['blok_ke'];
    $baris_ke = $_POST['baris_ke'];
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];
    $tanggal_penghitungan = date('Y-m-d');

    $model = new DataModel();

    $existingData = $model->getDataByBlokBaris($blok_ke, $baris_ke);
    
    if ($existingData) {
        $model->updateData($existingData[0]['id'], $jumlah, $keterangan);
    } else {
        $model->simpanData($blok_ke, $baris_ke, $jumlah, $keterangan, $tanggal_penghitungan);
    }

    header('Location: ../views/data.php');
    exit();
}
