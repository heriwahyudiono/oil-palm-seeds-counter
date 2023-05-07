<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="../assets/images/ptpn6.png">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
	<title>Daftar</title>
</head>
<body>
    <div id="oil_body_wrap" class="oil_header_padding oil_second">
        <div class="oil_header">
            <a href="./login.php"><img src="../assets/images/img_icon_back.svg">Kembali</a>
        </div>
        <div class="oil_content oil_bg_leaf">
            <div>
				<h2>Daftar
					<br>
					<span>Akun</span>
				</h2>
                <img class="img_icon_head" src="../assets/images/img_icon_signup_color.svg" alt="" srcset="">
				<form action="../controllers/RegisterController.php" method="POST">
					<label for="nama_lengkap">Nama Lengkap:</label>
                    <div class="oil_input_name oil_input_icon oil_input_wrap">
						<input type="text" id="nama_lengkap" name="nama_lengkap" required class="oil_input" placeholder="Enter your full name">
					</div>
					<label for="jenis_kelamin">Jenis Kelamin:</label>
					<input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" required>
					<label for="laki-laki" class="oil_radio_label">Laki-laki</label><br>
					<input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required style="margin-top: 8px">
					<label for="perempuan" class="oil_radio_label">Perempuan</label>

					<label for="tanggal_lahir" style="margin-top:24px">Tanggal Lahir:</label>
                    <div class="oil_input_date oil_input_icon oil_input_wrap">
						<input type="date" id="tanggal_lahir" name="tanggal_lahir" required class="oil_input"><br>
					</div>
					<label for="email">Email:</label>
                    <div class="oil_input_email oil_input_icon oil_input_wrap">
						<input type="email" id="email" name="email" required class="oil_input" placeholder="Enter your email"><br>
					</div>
					<label for="nomor_telepon">Nomor Telepon:</label>
                    <div class="oil_input_phone oil_input_icon oil_input_wrap">
						<input type="text" id="nomor_telepon" name="nomor_telepon" required class="oil_input" placeholder="Enter your phone number"><br>
					</div>
					<label for="password">Kata Sandi:</label>
                    <div class="oil_input_password oil_input_icon oil_input_wrap">
						<input type="password" id="password" name="password" required class="oil_input" placeholder="********"><br>
					</div>
					<label for="konfirmasi_password">Ulangi Kata Sandi:</label>
                    <div class="oil_input_password oil_input_icon oil_input_wrap">
						<input type="password" id="konfirmasi_password" name="konfirmasi_password" required class="oil_input" placeholder="********"><br>
					</div>
					<?php
						if(isset($_SESSION['password_error'])) {
							echo "<p>{$_SESSION['password_error']}</p>";
							unset($_SESSION['password_error']);
						}
					?>
					
					</div>
					<div class="oil_footer">
						<div class="oil_wrap_bottom">
							<button type="submit" value="Daftar" class="btn">Daftar</button>
						</div>
						<p class="oil_margin_object_bawah">Sudah punya akun? <a href="./login.php" style="display: inline; text-decoration: underline">Login</a></p>
					</div>
				</form>
		</div>
	</div>
</body>
</html>
