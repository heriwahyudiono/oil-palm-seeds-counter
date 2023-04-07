<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>
</head>
<body>
    <h2>Ubah Password</h2>
    <?php
    if (isset($_SESSION['succes_message'])) {
        echo "<p>{$_SESSION['succes_message']}</p>";
        unset($_SESSION['succes_message']);
    }
    ?>
    <form action="../controllers/UbahPasswordController.php" method="POST">
        <label>Password Lama:</label>
        <input type="password" name="password_lama" required><br>
        <?php
        if (isset($_SESSION['error_old_password'])) {
            echo "<p>{$_SESSION['error_old_password']}</p>";
            unset($_SESSION['error_old_password']);
        }
        ?>

        <label>Password Baru:</label>
        <input type="password" name="password_baru" required><br>

        <label>Konfirmasi Password Baru:</label>
        <input type="password" name="konfirmasi_password_baru" required><br>
        <?php
        if (isset($_SESSION['error_new_password'])) {
            echo "<p>{$_SESSION['error_new_password']}</p>";
            unset($_SESSION['error_new_password']);
        }
        ?>

        <button type="submit" name="submit">Ubah Password</button>
    </form>

    <a href="./settings.php">Kembali</a>
</body>
</html>