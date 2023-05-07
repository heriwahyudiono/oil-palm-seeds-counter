<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="../assets/images/ptpn6.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="../manifest.json" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Login</title>
</head>
<body>
    <div id="oil_body_wrap" class="oil_header_padding oil_third">
        <form action="../controllers/LoginController.php" method="POST">
            <div class="oil_bg_login">
                <div class="oil_content" style="padding-top: 32px !important">
                    <h2 style="margin-bottom: 164px">Oil Palm <br><span>Seeds Counter</span></h2>
                    <img class="img_login_logo" src="../assets/images/ptpn6.png" alt="" srcset="">
                    <div class="oil_input_email oil_input_icon oil_input_wrap" style="margin-bottom: 24px">
                        <input type="email" id="email" name="email" required class="oil_input" placeholder="Alamat Email"><br>
                    </div>
                    <?php
                        if(isset($_SESSION['email_error'])) {
                            echo "<p>{$_SESSION['email_error']}</p>";
                            unset($_SESSION['email_error']);
                        }
                    ?>
                    <div class="oil_input_password oil_input_icon oil_input_wrap">
                        <input type="password" id="password" name="password" required class="oil_input" placeholder="Kata Sandi"><br>
                    </div>
                    <a class="oil_label_bottom" href="./lupa-password.php" style="text-decoration: underline">Lupa password?</a>
                    <?php
                        if(isset($_SESSION['password_error'])) {
                            echo "<p>{$_SESSION['password_error']}</p>";
                            unset($_SESSION['password_error']);
                        }
                    ?>
                </div>
            </div>
            <div class="oil_footer oil_login">
                        <div class="oil_wrap_bottom">
                            <button type="submit" value="Login" class="btn">Masuk</button>
                        </div>
                    <p class="oil_margin_object_bawah">Belum punya akun? <a href="./register.php" style="display: inline; text-decoration: underline">Daftar</a></p>
            </div>
        </form>
    </div>
        <script>
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', function () {
                    navigator.serviceWorker.register('../service-worker.js').then(function (registration) {
                        console.log('ServiceWorker registration successful with scope: ', registration.scope);
                    }, function (err) {
                        console.log('ServiceWorker registration failed: ', err);
                    });
                });
            }
        </script>
    </div>
</body>
</html>

