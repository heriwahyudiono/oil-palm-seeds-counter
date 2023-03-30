<?php
session_start();
require_once '../models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userModel = new UserModel();
    $user = $userModel->getUserByEmail($email);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['password'] = $user['password'];
            header("Location: ../views/hitung.php");
        } else {
            echo "Password yang Anda masukkan salah";
        }
    } else {
        echo "Email tidak terdaftar";
    }
}
