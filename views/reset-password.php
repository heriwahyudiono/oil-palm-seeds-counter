<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" type="image/x-icon" href="../assets/images/ptpn6.png">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css">
	<title>Reset Password</title>
</head>
<body>
	<div id="oil_body_wrap">
		<div class="oil_content oil_bg_leaf">
			<h2>Reset Password</h2>
			<form action="../controllers/ResetPasswordController.php" method="post">
				<label>Password Baru:</label>
				<div class="oil_input_password oil_input_icon oil_input_wrap">
					<input type="password" name="password_baru" required class="oil_input" placeholder="********">
				</div>
				<label>Konfirmasi Password Baru:</label>
				<div class="oil_input_email oil_input_icon oil_input_wrap">
					<input type="password" name="konfirmasi_password_baru" required class="oil_input" placeholder="********">
				</div>
				<div class="oil_footer" style="background: none; padding-left: 0px">
					<div class="oil_wrap_bottom">
						<button type="submit" name="submit" class="btn" style="width: max-content">Reset Password</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>