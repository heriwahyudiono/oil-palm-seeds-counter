<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar</title>
</head>
<body>
	<h2>Daftar</h2>
	<form action="../controllers/RegisterController.php" method="POST">
		<label for="nama_lengkap">Nama Lengkap:</label><br>
		<input type="text" id="nama_lengkap" name="nama_lengkap" required><br>

		<label for="jenis_kelamin">Jenis Kelamin:</label><br>
		<input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" required>
		<label for="laki-laki">Laki-laki</label><br>
		<input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
		<label for="perempuan">Perempuan</label><br>

		<label for="tanggal_lahir">Tanggal Lahir:</label><br>
		<input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br>

		<label for="email">Email:</label><br>
		<input type="email" id="email" name="email" required><br>

		<label for="nomor_telepon">Nomor Telepon:</label><br>
		<input type="text" id="nomor_telepon" name="nomor_telepon" required><br>

		<label for="password">Password:</label><br>
		<input type="password" id="password" name="password" required><br>

		<label for="konfirmasi_password">Konfirmasi Password:</label><br>
		<input type="password" id="konfirmasi_password" name="konfirmasi_password" required><br>
        <input type="submit" value="Daftar">
    </form><br>
	<a href="./login.php">Login</a>
</body>
</html>