<?php
require_once '../models/UserModel.php';

session_start();

if (isset($_SESSION['id'])) {
    $userModel = new UserModel();
    $user = $userModel->getUserById($_SESSION['id']);
    $name = $user['name'];
    $gender = $user['gender'];
    $date_of_birth = $user['date_of_birth'];
    $date_of_birth = date('d-m-Y', strtotime($date_of_birth));
    $email = $user['email'];
    $phone_number = $user['phone_number'];

    if ($gender === 'Male') {
        $gender = 'Laki-laki';
    } else if ($gender === 'Female') {
        $gender = 'Perempuan';
    }
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
    <title>Profile</title>
</head>
<body>
    <div id="oil_body_wrap" class="oil_header_padding oil_second">
        <div class="oil_header">
            <a href="./settings.php"><img src="../assets/images/img_icon_back.svg">Kembali</a>
        </div>
        <div class="oil_content oil_bg_leaf" style="padding-bottom: 16px">
            <div>
                <h2>Profil</h2>
                <img class="img_icon_head" src="../assets/images/img_icon_user_color.svg" alt="" srcset="">
                <?php
                if (isset($_SESSION['success_message'])) {
                    echo "<p>{$_SESSION['success_message']}</p>";
                    unset($_SESSION['success_message']);
                }
                ?>
                
                <p class="oil_profil_data_label" style="margin-top: 0px">Nama: 
                    <div class="oil_profil_data oil_name">
                        <?php echo $name; ?>
                    </div>
                </p>
                <p class="oil_profil_data_label">Jenis Kelamin: 
                    <div class="oil_profil_data oil_gender">
                        <?php echo $gender; ?>
                    </div>
                </p>
                <p class="oil_profil_data_label">Tanggal Lahir: 
                    <div class="oil_profil_data oil_date">
                        <?php echo $date_of_birth; ?>
                    </div>
                </p>
                <p class="oil_profil_data_label">Email: 
                    <div class="oil_profil_data oil_email">
                        <?php echo $email; ?>
                    </div>
                </p>
                <p class="oil_profil_data_label">Nomor Telepon: 
                    <div class="oil_profil_data oil_phone">
                        <?php echo $phone_number; ?>
                    </div>
                </p>
            </div>
                <a href="./edit-profile.php" class="btn" style="width: max-content; box-sizing: border-box; margin-left: 24px; margin-bottom: 16px !important">Ubah Profil</a>
        </div>
    </div>
</body>
</html>
