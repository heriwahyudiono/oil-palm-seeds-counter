<?php
// Informasi SMTP Gmail
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_AUTH', true);
define('SMTP_USERNAME', 'heriwhydiono@gmail.com');
define('SMTP_PASSWORD', '');
define('SMTP_SECURE', 'tls');
define('SMTP_PORT', 587);

require_once '../models/UserModel.php';
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userModel = new UserModel();
    $email = $_POST['email'];
    $user = $userModel->getUserByEmail($email);

    if ($user !== null) {
        $reset_token = bin2hex(random_bytes(32));
        $reset_link = "http://localhost/reset-password.php?token=$reset_token";
        $userModel->updateResetToken($user['id'], $reset_token);

        try {
            // Konfigurasi PHPMailer
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->SMTPAuth = SMTP_AUTH;
            $mail->Username = SMTP_USERNAME;
            $mail->Password = SMTP_PASSWORD;
            $mail->SMTPSecure = SMTP_SECURE;
            $mail->Port = SMTP_PORT;

            $to = $email;
            $subject = "Reset Password";
            $message = "Click the link below to reset your password: $reset_link";
            $mail->setFrom('heriwhydiono@gmail.com');
            $mail->addAddress($to);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->send();

            echo "Email has been sent to $email. Please follow the instructions to reset your password.";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email not found.";
    }
}
