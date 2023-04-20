<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
	<title>Lupa Password</title>
</head>
<body>
    <div id="oil_body_wrap">
        <div class="oil_content oil_bg_leaf">
			<h2>Lupa<br>
				<span>Kata Sandi</span>
			</h2>

			<form action="../controllers/LupaPasswordController.php" method="post">
				<label for="email">Masukkan Email Anda</label>
				<div class="oil_input_email oil_input_icon oil_input_wrap">
					<input type="email" id="email" name="email" required class="oil_input" placeholder="budibudiman@email.com">
				</div>
			</form>
		</div>
			<div class="oil_footer" style="background: none">
                <div class="oil_wrap_bottom">
					<button type="submit" name="submit" class="btn" style="width: max-content">Ubah Kata Sandi</button>
                </div>
            <!-- <p class="oil_margin_object_bawah">Belum punya akun? <a href="./register.php">Daftar</a></p> -->
        </div>
	</div>
</body>
</html>