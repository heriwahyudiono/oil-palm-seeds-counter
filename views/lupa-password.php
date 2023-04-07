<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lupa Password</title>
</head>
<body>
	<h2>Lupa Password</h2>

	<form action="../controllers/LupaPasswordController.php" method="post">
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br><br>
		<button type="submit" name="submit">Kirim Email</button>
	</form>
</body>
</html>