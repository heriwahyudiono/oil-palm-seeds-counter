<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="../manifest.json" />
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="../controllers/LoginController.php" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <?php
            if(isset($_SESSION['email_error'])) {
                echo "<p>{$_SESSION['email_error']}</p>";
                unset($_SESSION['email_error']);
            }
        ?>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <?php
            if(isset($_SESSION['password_error'])) {
                echo "<p>{$_SESSION['password_error']}</p>";
                unset($_SESSION['password_error']);
            }
        ?>
        <input type="submit" value="Login">
    </form>
    
    <p>Belum punya akun? <a href="./register.php">Daftar</a></p>
    <a href="./lupa-password.php">Lupa password?</a>

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function () {
                navigator.serviceWorker.register('../service-worker.js').then(function (registration) {
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function (err) {
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
</body>
</html>

