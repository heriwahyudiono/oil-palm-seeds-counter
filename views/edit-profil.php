<?php
require_once '../models/UserModel.php';

session_start();

if (isset($_SESSION['id'])) {
    $userModel = new UserModel();
    $user = $userModel->getUserById($_SESSION['id']);
    $nama_lengkap = $user['nama_lengkap'];
    $jenis_kelamin = $user['jenis_kelamin'];
    $tanggal_lahir = $user['tanggal_lahir'];
    $email = $user['email'];
    $nomor_telepon = $user['nomor_telepon'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
</head>
<body>
    <h2>Edit Profil</h2>
    <form action="../controllers/EditProfilController.php" method="post">
        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?php echo isset($user['nama_lengkap']) ? $user['nama_lengkap'] : ''; ?>" required><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="">Pilih jenis kelamin</option>
            <option value="Laki-laki" <?php if (isset($user['jenis_kelamin']) && $user['jenis_kelamin'] == 'Laki-laki') { echo 'selected'; } ?>>Laki-laki</option>
            <option value="Perempuan" <?php if (isset($user['jenis_kelamin']) && $user['jenis_kelamin'] == 'Perempuan') { echo 'selected'; } ?>>Perempuan</option>
        </select><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo isset($user['tanggal_lahir']) ? $user['tanggal_lahir'] : ''; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>" required><br>

        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="text" id="nomor_telepon" name="nomor_telepon" value="<?php echo isset($user['nomor_telepon']) ? $user['nomor_telepon'] : ''; ?>" required><br>

        <button type="submit">Simpan</button>
    </form>
    <a href="./home.php">Kembali</a>
</body>
</html>
