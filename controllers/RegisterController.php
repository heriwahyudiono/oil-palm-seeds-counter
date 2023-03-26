<?php
require_once '../models/UserModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    if ($password != $konfirmasi_password) {
        echo "Konfirmasi password tidak sesuai";
        exit;
    }

    $userModel = new UserModel();
    $userModel->registerUser($nama_lengkap, $jenis_kelamin, $tanggal_lahir, $email, $nomor_telepon, $password);
    $userModel->closeConnection();
}
