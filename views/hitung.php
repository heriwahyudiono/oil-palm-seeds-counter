<?php
require_once '../models/UserModel.php';

session_start();

if (isset($_SESSION['id'])) {
    $userModel = new UserModel();
    $user = $userModel->getUserById($_SESSION['id']);
    $nama_lengkap = $user['nama_lengkap'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oil Palm Seeds Counter</title>
</head>
<body>
    <h2>Selamat Datang <?php if(isset($nama_lengkap)){echo $nama_lengkap;} ?>, Selamat Menghitung</h2>
    <a href="./profil.php">Profil</a><br>
    <a href="./settings.php">Settings</a><br><br>
    <form action="../controllers/HitungController.php" method="POST">
        <div>
            <label for="">Blok ke</label>
            <input type="text" name="blok_ke"><br>
            <label for="">Baris ke</label>
            <input type="text" name="baris_ke"><br>
            <label for="">Keterangan</label>
            <input type="text" name="keterangan"><br>
            <label for="">Jumlah</label>
            <h2 id="jumlah">0</h2>
            <button type="button" onclick="tambah()">Hitung</button>
            <button type="submit">Simpan</button>
        </div>
    </form>

    <a href="./data.php">Lihat data</a><br>
    <a href="../controllers/LogoutController.php">Logout</a>

    <script>
        let jumlah = 0;

        function tambah() {
            jumlah++;
            document.getElementById("jumlah").innerHTML = jumlah;
        }

        const simpanButton = document.querySelector("button[type='submit']");
        simpanButton.addEventListener("click", function() {
            const jumlahInput = document.createElement("input");
            jumlahInput.type = "hidden";
            jumlahInput.name = "jumlah";
            jumlahInput.value = jumlah;
            document.querySelector("form").appendChild(jumlahInput);
        });
    </script>
</body>
</html>
