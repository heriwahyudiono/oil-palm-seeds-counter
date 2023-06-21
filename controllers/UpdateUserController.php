<?php
require_once '../models/UserModel.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userModel = new UserModel();
    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $userModel->updateUser($id, $name, $gender, $date_of_birth, $email, $phone_number);

    $_SESSION['success_message'] = "Profil berhasil diperbarui";
    $userModel->closeConnection();
    header("Location: ../views/profile.php");
}
