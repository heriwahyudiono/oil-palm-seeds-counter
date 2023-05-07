<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" type="image/x-icon" href="../assets/images/ptpn6.png">
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
			<p>Kami akan mengirim tautan untuk mereset password Anda</p>
			<form action="../controllers/LupaPasswordController.php" method="post">
				<label for="email">Alamat Email</label>
				<div class="oil_input_email oil_input_icon oil_input_wrap">
					<input type="email" id="email" name="email" required class="oil_input" placeholder="Enter your email address">
				</div>
				<div class="oil_footer" style="background: none">
					<div class="oil_wrap_bottom">
						<button type="submit" name="submit" class="btn" style="width: max-content">Kirim Tautan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>