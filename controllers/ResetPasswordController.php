<?php
require_once '../models/UserModel.php';

$userModel = new UserModel();

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $user = $userModel->getUserByToken($token);

    if ($user) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password_baru = $_POST['password_baru'];
            $konfirmasi_password_baru = $_POST['konfirmasi_password_baru'];

            if (strlen($password_baru) < 6) {
                $error = 'Password minimal 6 karakter';
            } else if ($password_baru !== $konfirmasi_password_baru) {
                $error = 'Password dan konfirmasi password tidak sama';
            } else {
                $userModel->updatePassword($user['id'], $password_baru);
                $userModel->resetToken($user['id'], null);
                $success = 'Password berhasil di reset';
            }
        }
    } else {
        $error = 'Token tidak valid atau sudah kadaluarsa';
    }
}

$userModel->closeConnection();
