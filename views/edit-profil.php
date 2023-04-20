<?php
require_once '../models/UserModel.php';

session_start();

if (isset($_SESSION['id'])) {
    $userModel = new UserModel();
    $user = $userModel->getUserById($_SESSION['id']);
    $nama_lengkap = $user['nama_lengkap'];
    $jenis_kelamin = $user['jenis_kelamin'];
    $tanggal_lahir = $user['tanggal_lahir'];
    $email = $user['email'];
    $nomor_telepon = $user['nomor_telepon'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Edit Profil</title>
</head>
<body>
    <div id="oil_body_wrap" class="oil_header_padding oil_second">
        <div class="oil_header">
            <a href="./profil.php"><img src="../assets/images/img_icon_back.svg">Kembali</a>
        </div>
        <div class="oil_content oil_bg_leaf">
            <div>
            <h2>Ubah<br>
                <span>Profil</span>
            </h2>
            <img class="img_icon_head" src="../assets/images/img_icon_user_color.svg" alt="" srcset="">
            <form action="../controllers/EditProfilController.php" method="post">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <div class="oil_input_name oil_input_icon oil_input_wrap">
                    <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?php echo isset($user['nama_lengkap']) ? $user['nama_lengkap'] : ''; ?>"  class="oil_input" required><br>
                </div>
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin"  class="oil_input" required>
                    <option value="">Pilih jenis kelamin</option>
                    <option value="Laki-laki" <?php if (isset($user['jenis_kelamin']) && $user['jenis_kelamin'] == 'Laki-laki') {
                                                    echo 'selected';
                                                } ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if (isset($user['jenis_kelamin']) && $user['jenis_kelamin'] == 'Perempuan') {
                                                    echo 'selected';
                                                } ?>>Perempuan</option>
                </select><br>

                <label for="tanggal_lahir" style="margin-top:24px">Tanggal Lahir:</label>
                <div class="oil_input_date oil_input_icon oil_input_wrap">
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo isset($user['tanggal_lahir']) ? $user['tanggal_lahir'] : ''; ?>"  class="oil_input" required><br>
                </div>
                <label for="email">Email:</label>
                <div class="oil_input_email oil_input_icon oil_input_wrap">
                    <input type="email" id="email" name="email" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>"  class="oil_input" required><br>
                </div>
                <label for="nomor_telepon">Nomor Telepon:</label>
                <div class="oil_input_phone oil_input_icon oil_input_wrap">
                    <input type="text" id="nomor_telepon" name="nomor_telepon" value="<?php echo isset($user['nomor_telepon']) ? $user['nomor_telepon'] : ''; ?>"  class="oil_input" required><br>
                </div>	
            </div>
				<div class="oil_footer">
					<div class="oil_wrap_bottom">
                        <button type="submit" class="btn" style="width: max-content">Simpan</button>
                    </div>
						<!-- <p class="oil_margin_object_bawah">Sudah punya akun? <a href="./login.php" style="display: inline; text-decoration: underline">Login</a></p> -->
				</div>
            </form>
		</div>
	</div>
</body>
</html>