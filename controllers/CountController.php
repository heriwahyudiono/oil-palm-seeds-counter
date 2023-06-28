<?php

require_once '../models/DataModel.php';

class CountController
{
    private $model;

    public function __construct()
    {
        $this->model = new DataModel();
    }

    public function count()
    {
        include '../views/count.php';
    }

    public function save()
    {
        $blok_ke = $_POST['blok_ke'] ?? null;
        $baris_ke = $_POST['baris_ke'] ?? null;
        $jumlah = $_POST['jumlah'] ?? null;
        $keterangan = $_POST['keterangan'] ?? null;

        if (!$blok_ke || !$baris_ke || !$jumlah) {
            header('Location: ../views/count.php');
            return;
        }

        $this->model->saveData($blok_ke, $baris_ke, $jumlah, $keterangan);

        echo '<audio autoplay><source src="../assets/audio/data-berhasil-disimpan.mp3" type="audio/mpeg"></audio>';

        echo '<script>setTimeout(function() { window.location.href = "../views/data.php"; }, 3000);</script>';
    }

    public function __destruct()
    {
        $this->model->closeConnection();
    }
}

$controller = new CountController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['blok_ke'], $_POST['baris_ke'], $_POST['jumlah'])) {
    $controller->save();
} else {
    $controller->count();
}
