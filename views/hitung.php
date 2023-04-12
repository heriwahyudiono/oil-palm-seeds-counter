<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ./login.php');
    exit();
}

require_once '../models/UserModel.php';

$userModel = new UserModel();
$user = $userModel->getUserById($_SESSION['id']);
if ($user !== null) {
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
    <style>
        .vibrate {
            animation: vibrate 0.3s;
            width: 125px;
            height: 125px;
        }

        @keyframes vibrate {
            0% {
                transform: translate(0);
            }

            25% {
                transform: translate(-2px, 2px);
            }

            50% {
                transform: translate(0);
            }

            75% {
                transform: translate(2px, -2px);
            }

            100% {
                transform: translate(0);
            }
        }

        .vibrate-active {
            animation: none;
            transform: translate(0);
        }
    </style>
</head>
<body>
    <h2>Selamat datang <?php if (isset($nama_lengkap)) {
                            echo $nama_lengkap;
                        } ?>, selamat menghitung</h2>
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
            <button type="submit" onclick="simpan()">Simpan</button>
            <audio id="simpan">
                <source src="../assets/audio/data-berhasil-disimpan.mp3" type="audio/mpeg">
            </audio>
            <button type="button" onmousedown="tambah(); hitung(); document.querySelector('.vibrate').classList.add('vibrate-active')" class="vibrate">Hitung</button>
            <audio id="hitung">
                <source src="../assets/audio/censor-beep-1sec-8112.mp3" type="audio/mpeg">
            </audio>
        </div>
    </form>

    <a href="./data.php">Lihat data</a><br>
    <a href="../controllers/LogoutController.php">Logout</a>

    <script>
        document.querySelector(".vibrate").addEventListener("mouseup", function() {
            document.querySelector(".vibrate").classList.remove("vibrate-active");
        });

        function hitung() {
            const audio = document.getElementById("hitung");
            audio.play();
            setTimeout(function() {
                audio.pause();
                audio.currentTime = 0;
            }, 100);
        }

        function simpan() {
            const audio = document.getElementById("simpan");
            audio.play();
            audio.addEventListener("ended", function() {
                window.location.href = "../views/data.php";
            });
        }

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