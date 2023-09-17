<?php
require_once '../models/UserModel.php';

$userModel = new UserModel();
$error = '';
$success = '';

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
                    $error = 'Password minimal 6 karakter';
                } else if ($new_password !== $confirm_new_password) {
                    $error = 'Password baru dan konfirmasi password baru tidak sama';
                } else {
                    $userModel->updatePassword($user['id'], $new_password);
                    $userModel->resetToken($user['email'], null); 
                    $success = 'Password berhasil direset';
                }
            } else {
                $error = 'Ada masalah dengan data yang dikirimkan';
            }
        }
    } else {
        $error = 'Token tidak valid atau sudah kadaluarsa';
    }
} else {
    $error = 'Token tidak ditemukan';
}

$userModel->closeConnection();
?>
