<?php
session_start();
require_once '../models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    $userModel = new UserModel();
    $user = $userModel->getUserById($id);

    if ($user) {
        if (password_verify($old_password, $user['password'])) {
            if ($new_password == $confirm_new_password) {
                $userModel->updatePassword($id, $new_password);
                $_SESSION['success_message'] = "Password berhasil diubah";
                header("Location: ../views/ubah-password.php");
            } else {
                $_SESSION['error_new_password'] = "Konfirmasi password baru tidak cocok";
                header("Location: ../views/ubah-password.php");
            }
        } else {
            $_SESSION['error_old_password'] = "Password lama yang Anda masukkan salah";
            header("Location: ../views/change-password.php");
        }
    }

    $userModel->closeConnection();
}
