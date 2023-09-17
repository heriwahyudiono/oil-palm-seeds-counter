<?php
require_once '../models/UserModel.php';

$userModel = new UserModel();

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $user = $userModel->getUserByToken($token);

    if ($user) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['new_password']) && isset($_POST['confirm_new_password'])) {
                $new_password = trim($_POST['new_password']);
                $confirm_new_password = trim($_POST['confirm_new_password']);
                $new_password = htmlspecialchars($new_password);
                $confirm_new_password = htmlspecialchars($confirm_new_password);

                if (strlen($new_password) < 6) {
                    echo 'Password minimal 6 karakter';
                } else if ($new_password !== $confirm_new_password) {
                    echo 'Password baru dan konfirmasi password baru tidak sama';
                } else {
                    $userModel->updatePassword($user['id'], $new_password);
                    $userModel->resetToken($user['email'], null); 
                    echo 'Password berhasil direset';
                }
            }
        }
    } else {
        echo 'Token tidak valid atau sudah kadaluarsa';
    }
}

$userModel->closeConnection();
