<?php
require_once '../models/UserModel.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userModel = new UserModel();
    $id = $_SESSION['id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];

    $userModel->updateUser($id, $nama_lengkap, $jenis_kelamin, $tanggal_lahir, $email, $nomor_telepon);

    echo "Profil berhasil di update";

    header("Location: ../views/profil.php");
}

