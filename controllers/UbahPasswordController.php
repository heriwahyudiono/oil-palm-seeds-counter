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
                echo "Password berhasil diubah";
            } else {
                echo "Konfirmasi password baru tidak cocok";
            }
        } else {
            echo "Password lama yang Anda masukkan salah";
        }
    }
}
