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
    <form action="../controllers/UbahPasswordController.php" method="POST">
        <label>Password Lama:</label>
        <input type="password" name="password_lama" required><br>

        <label>Password Baru:</label>
        <input type="password" name="password_baru" required><br>

        <label>Konfirmasi Password Baru:</label>
        <input type="password" name="konfirmasi_password_baru" required><br>

        <button type="submit" name="submit">Ubah Password</button>
    </form>

    <a href="./settings.php">Kembali</a>
</body>
</html>
