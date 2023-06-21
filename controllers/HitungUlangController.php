<?php
require_once '../models/DataModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blok_ke = $_POST['blok_ke'];
    $baris_ke = $_POST['baris_ke'];
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];
    $tanggal_hitung = date('Y-m-d');

    $model = new DataModel();

    $existingData = $model->getDataByBlokBaris($blok_ke, $baris_ke);

    if ($existingData) {
        $model->updateData($existingData[0]['id'], $jumlah, $keterangan);
        echo '<audio autoplay><source src="../assets/audio/data-berhasil-diperbarui.mp3" type="audio/mpeg"></audio>';
    } else {
        $model->simpanData($blok_ke, $baris_ke, $jumlah, $keterangan, $tanggal_hitung);
        echo '<audio autoplay><source src="../assets/audio/data-baru-ditambahkan.mp3" type="audio/mpeg"></audio>';
    }

    echo '<script>setTimeout(function() { window.location.href = "../views/data.php"; }, 3000);</script>';
    exit();
}

$model->closeConnection();
