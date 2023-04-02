<?php

require_once '../models/DataModel.php';

class HitungController
{
    public function hitung()
    {
        include '../views/hitung.php';
    }

    public function simpan()
    {
        $blok_ke = $_POST['blok_ke'] ?? null;
        $baris_ke = $_POST['baris_ke'] ?? null;
        $jumlah = $_POST['jumlah'] ?? null;
        $keterangan = $_POST['keterangan'] ?? null;

        if (!$blok_ke || !$baris_ke || !$jumlah) {
            header('Location: ../views/hitung.php');
            return;
        }

        $model = new DataModel();
        $model->simpanData($blok_ke, $baris_ke, $jumlah, $keterangan);

        echo '<audio autoplay><source src="../assets/audio/data-berhasil-disimpan.mp3" type="audio/mpeg"></audio>';

        usleep(2100000);

        header('Location: ../views/data.php');
    }
}

$controller = new HitungController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['blok_ke'], $_POST['baris_ke'], $_POST['jumlah'])) {
    $controller->simpan();
} else {
    $controller->hitung();
}
