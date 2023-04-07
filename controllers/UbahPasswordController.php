<?php
session_start();
require_once '../models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id'];
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi_password_baru = $_POST['konfirmasi_password_baru'];

    $userModel = new UserModel();
    $user = $userModel->getUserById($id);

    if ($user) {
        if (password_verify($password_lama, $user['password'])) {
            if ($password_baru == $konfirmasi_password_baru) {
                $userModel->updatePassword($id, $password_baru);
                $_SESSION['succes_message'] = "Password berhasil diubah";
                header("Location: ../views/ubah-password.php");
            } else {
                $_SESSION['error_new_password'] = "Konfirmasi password baru tidak cocok";
                header("Location: ../views/ubah-password.php");
            }
        } else {
            $_SESSION['error_old_password'] = "Password lama yang Anda masukkan salah";
            header("Location: ../views/ubah-password.php");
        }
    }
}

$userModel->closeConnection();
