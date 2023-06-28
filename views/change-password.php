<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="../assets/images/ptpn6.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Change Password</title>
</head>
<body>
    <div id="oil_body_wrap" class="oil_header_padding oil_second">
        <div class="oil_header">
            <a href="./settings.php"><img src="../assets/images/img_icon_back.svg">Kembali</a>
        </div>
        <div class="oil_content oil_bg_leaf">
            <div>
                <h2>Ubah<br>
                    <span>Kata Sandi</span>
                </h2>
                <img class="img_icon_head" src="../assets/images/img_icon_lock_color.svg" alt="" srcset="">
                <?php
                if (isset($_SESSION['success_message'])) {
                    echo "<p>{$_SESSION['success_message']}</p>";
                    unset($_SESSION['success_message']);
                }
                ?>
            </div>
            <form action="../controllers/UpdatePasswordController.php" method="POST">
                <div class="oil_form_top">
                    <label>Kata Sandi Lama:</label>
                    <div class="oil_input_password oil_orange oil_input_icon oil_input_wrap">
                        <input type="password" name="old_password" required class="oil_input" placeholder="********">
                    </div>
                    <?php
                    if (isset($_SESSION['error_old_password'])) {
                        echo "<p>{$_SESSION['error_old_password']}</p>";
                        unset($_SESSION['error_old_password']);
                    }
                    ?>

                    <label>Kata Sandi Baru:</label>
                    <div class="oil_input_password oil_input_icon oil_input_wrap">
                        <input type="password" name="new_password" required class="oil_input" placeholder="********">
                    </div>
                    <label>Ulangi Kata Sandi Baru:</label>
                    <div class="oil_input_password oil_input_icon oil_input_wrap">
                        <input type="password" name="confirm_new_password" required class="oil_input" placeholder="********">
                    </div>
                    <?php
                    if (isset($_SESSION['error_new_password'])) {
                        echo "<p>{$_SESSION['error_new_password']}</p>";
                        unset($_SESSION['error_new_password']);
                    }
                    ?>
                </div>
                <div class="oil_footer">
                    <div class="oil_wrap_bottom">
                        <button type="submit" name="submit" class="btn" style="width: max-content">Ubah Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>