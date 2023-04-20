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
    <link rel="stylesheet" href="../assets/css/style.css">
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
    <div id="oil_body_wrap" class="oil_header_padding oil_second">
        <div class="oil_header">
                <a class="oil_wrap_button_header" href="./settings.php"><img src="../assets/images/img_icon_setting.svg" alt="" srcset=""></a>
            <!-- <a href="./profil.php" style="display: inline-flex !important"><img src="../assets/images/img_icon_back.svg"></a> -->
            <!-- <div class="oil_wrap_header_menu">
                <a class="oil_wrap_button_header" href="./data.php">Lihat data <img src="../assets/images/img_icon_document.svg" alt="" srcset=""></a>
            </div> -->
                <a class="oil_wrap_button_header" href="./data.php">Lihat data <img src="../assets/images/img_icon_document.svg" alt="" srcset=""></a>
        </div>
        <div class="oil_content oil_bg_leaf">
            <div>
                <div id="oil_selamat_datang">Selamat Datang <span><?php if (isset($nama_lengkap)) {
                            echo $nama_lengkap;
                        } ?></span>!
                </div>
                <h2>Selamat<br> 
                    <span>Menghitung</span>
                </h2>
    <form action="../controllers/HitungController.php" method="POST">
        <div>
            <div class="oil_d_column">
                <div>
                    <label for="">Blok ke</label>
                    <div class="oil_input_column oil_input_icon oil_input_wrap">
                        <input type="text" name="blok_ke" class="oil_input" placeholder="0">
                    </div>
                </div>
                <div>
                    <label for="">Baris ke</label>
                    <div class="oil_input_row oil_input_icon oil_input_wrap">
                        <input type="text" name="baris_ke" class="oil_input" placeholder="0">
                    </div>
                </div>
            </div>
            <label for="" style="margin-top: 24px">Keterangan</label>
            <div class="oil_input_description oil_input_icon oil_input_wrap">
                <input type="text" name="keterangan" class="oil_input" placeholder="Penjelasan data...">
            </div>
            <label for="">Jumlah</label>
            <div id="oil_show_data">
                <h2 id="jumlah">0</h2>
                <button type="submit" onclick="simpan()" class="btn">Simpan</button>
            </div>
            <audio id="simpan">
                <source src="../assets/audio/data-berhasil-disimpan.mp3" type="audio/mpeg">
            </audio>
            <audio id="hitung">
                <source src="../assets/audio/censor-beep-1sec-8112.mp3" type="audio/mpeg">
            </audio>
        </div>
</div>
				<div class="oil_footer">
					<div class="oil_wrap_bottom">
                        <button type="button" onmousedown="tambah(); hitung(); document.querySelector('.vibrate').classList.add('vibrate-active')" class="vibrate btn oil_btn_hitung">Hitung</button>
                    </div>
						<!-- <p class="oil_margin_object_bawah">Sudah punya akun? <a href="./login.php" style="display: inline; text-decoration: underline">Login</a></p> -->
				</div>
            </form>
		</div>
	</div>
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