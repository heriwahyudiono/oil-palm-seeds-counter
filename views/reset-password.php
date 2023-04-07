<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reset Password</title>
</head>
<body>
	<h2>Reset Password</h2>

	<form action="../controllers/ResetPasswordController.php" method="post">
		<label>Password Baru:</label>
		<input type="password" name="password_baru" required><br><br>
		<label>Konfirmasi Password Baru:</label>
		<input type="password" name="konfirmasi_password_baru" required><br><br>
		<button type="submit" name="submit">Reset Password</button>
	</form>
</body>
</html>