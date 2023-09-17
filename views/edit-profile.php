<?php
require_once '../models/UserModel.php';

session_start();

if (isset($_SESSION['id'])) {
    $userModel = new UserModel();
    $user = $userModel->getUserById($_SESSION['id']);
    $name = $user['name'];
    $gender = $user['gender'];
    $date_of_birth = $user['date_of_birth'];
    $email = $user['email'];
    $phone_number = $user['phone_number'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="../assets/images/ptpn6.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Edit Profile</title>
</head>
<body>
    <div id="oil_body_wrap" class="oil_header_padding oil_second">
        <div class="oil_header">
            <a href="./profile.php"><img src="../assets/images/img_icon_back.svg">Kembali</a>
        </div>
        <div class="oil_content oil_bg_leaf">
            <div>
                <h2>Ubah<br>
                    <span>Profil</span>
                </h2>
                <img class="img_icon_head" src="../assets/images/img_icon_user_color.svg" alt="" srcset="">
                <form action="../controllers/UpdateUserController.php" method="POST">
                    <label for="name">Nama Lengkap:</label>
                    <div class="oil_input_name oil_input_icon oil_input_wrap">
                        <input type="text" id="name" name="name" value="<?php echo isset($user['name']) ? $user['name'] : ''; ?>" class="oil_input" required><br>
                    </div>
                    <label for="gender">Jenis Kelamin:</label>
                    <select id="gender" name="gender" class="oil_input" required>
                        <option value="">Pilih jenis kelamin</option>
                        <option value="Male" <?php if (isset($user['gender']) && $user['gender'] == 'Male') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Female" <?php if (isset($user['gender']) && $user['gender'] == 'Female') echo 'selected'; ?>>Perempuan</option>
                    </select><br>

                    <label for="date_of_birth" style="margin-top:24px">Tanggal Lahir:</label>
                    <div class="oil_input_date oil_input_icon oil_input_wrap">
                        <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo isset($user['date_of_birth']) ? $user['date_of_birth'] : ''; ?>" class="oil_input" required><br>
                    </div>
                    <label for="email">Email:</label>
                    <div class="oil_input_email oil_input_icon oil_input_wrap">
                        <input type="email" id="email" name="email" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>" class="oil_input" required><br>
                    </div>
                    <label for="phone_number">Nomor Telepon:</label>
                    <div class="oil_input_phone oil_input_icon oil_input_wrap">
                        <input type="text" id="phone_number" name="phone_number" value="<?php echo isset($user['phone_number']) ? $user['phone_number'] : ''; ?>" class="oil_input" required><br>
                    </div>
                </div>
                <div class="oil_footer">
                    <div class="oil_wrap_bottom">
                        <button type="submit" class="btn" style="width: max-content">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
