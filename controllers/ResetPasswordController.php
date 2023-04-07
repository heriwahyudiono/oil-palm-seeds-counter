<?php
require_once '../models/UserModel.php';

$userModel = new UserModel();

// Cek apakah token valid
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $user = $userModel->getUserByToken($token);

    // Jika token valid, tampilkan form reset password
    if ($user) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            // Validasi password
            if (strlen($password) < 6) {
                $error = 'Password minimal 6 karakter';
            } elseif ($password !== $confirmPassword) {
                $error = 'Password dan konfirmasi password tidak sama';
            } else {
                // Update password dan hapus token
                $userModel->updatePassword($user['id'], $password);
                $userModel->updateToken($user['id'], null);
                header('Location: ../views/login.php');
            }
        }

        include '../views/reset-password.php';
    } else {
        header('Location: ../views/home.php');
    }
} else {
    header('Location: ../views/home.php');
}
