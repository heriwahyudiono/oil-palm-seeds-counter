<?php
require_once '../models/UserModel.php';

session_start();

if (isset($_SESSION['id'])) {
    $userModel = new UserModel();
    $user = $userModel->getUserById($_SESSION['id']);
    $nama_lengkap = $user['nama_lengkap'];
    $jenis_kelamin = $user['jenis_kelamin'];
    $tanggal_lahir = $user['tanggal_lahir'];
    $tanggal_lahir = date('d-m-Y', strtotime($tanggal_lahir));
    $email = $user['email'];
    $nomor_telepon = $user['nomor_telepon'];
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
    <title>Profil</title>
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
                if (isset($_SESSION['succes_message'])) {
                    echo "<p>{$_SESSION['succes_message']}</p>";
                    unset($_SESSION['succes_message']);
                }
                ?>
                
                <p class="oil_profil_data_label" style="margin-top: 0px">Nama: 
                    <div class="oil_profil_data oil_name">
                        <?php echo $nama_lengkap; ?>
                    </div>
                </p>
                <p class="oil_profil_data_label">Jenis Kelamin: 
                    <div class="oil_profil_data oil_gender">
                        <?php echo $jenis_kelamin; ?>
                    </div>
                </p>
                <p class="oil_profil_data_label">Tanggal Lahir: 
                    <div class="oil_profil_data oil_date">
                        <?php echo $tanggal_lahir; ?>
                    </div>
                </p>
                <p class="oil_profil_data_label">Email: 
                    <div class="oil_profil_data oil_email">
                        <?php echo $email; ?>
                    </div>
                </p>
                <p class="oil_profil_data_label">Nomor Telepon: 
                    <div class="oil_profil_data oil_phone">
                        <?php echo $nomor_telepon; ?>
                    </div>
                </p>
            </div>
                <a href="./edit-profil.php" class="btn" style="width: max-content; box-sizing: border-box; margin-left: 24px; margin-bottom: 16px !important">Ubah Profil</a>
        </div>
    </div>
</body>
</html>
