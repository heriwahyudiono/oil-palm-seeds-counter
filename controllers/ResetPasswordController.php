<?php
require_once '../models/UserModel.php';

$userModel = new UserModel();

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $user = $userModel->getUserByToken($token);

    if ($user) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $new_password = $_POST['new_password'];
            $confirm_new_password = $_POST['confirm_new_password'];

            if (strlen($new_password) < 6) {
                $error = 'Password minimal 6 karakter';
            } else if ($new_password !== $confirm_new_password) {
                $error = 'Password baru dan konfirmasi password baru tidak sama';
            } else {
                $userModel->updatePassword($user['id'], $new_password);
                $userModel->resetToken($user['email'], null); 
                $success = 'Password berhasil direset';
            }
        }
    } else {
        $error = 'Token tidak valid atau sudah kadaluarsa';
    }
}

$userModel->closeConnection();
