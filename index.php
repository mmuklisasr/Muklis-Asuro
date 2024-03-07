<?php
include "app/koneksi.php";
session_start();
$notif = ""; // Inisialisasi notifikasi
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $kueri = "SELECT * FROM guru WHERE username='$username' AND password='$password'";
    $user = $konek->query($kueri);
    $cek = $user->num_rows;
    $tampil = $konek->query("SELECT * FROM guru WHERE username = '$username'");
    $level = $tampil->fetch_array();


    if ($cek > 0) {

        if ($level['level'] == 'admin') {
            $_SESSION['username'] = $username;
            ?>
            <script type="text/javascript">
                window.location.href = 'app/index.php';
            </script>
            <?php
        } elseif ($level['level'] == 'user') {
            $_SESSION['username'] = $username;
            ?>
            <script type="text/javascript">
                window.location.href = 'appuser/index.php';
            </script>
            <?php
        }

    } else {
        $notif = "Username/kata sandi salah";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
<div class="infinity-container">
    <!-- Company Logo -->
    <div class="logo">
        <img src="image/logo.png" width="150px">
    </div>

    <!-- FORM CONTAINER BEGIN -->
    <div class="infinity-form-block">
        <div class="infinity-click-box text-center">Login into your account</div>

        <div class="infinity-fold">
            <div class="infinity-form">
                <form action="" method="POST" class="form-box">
                    <!-- Input Box -->
                    <div class="form-input">
                        <span><i class="fa fa-envelope"></i></span>
                        <input type="username" name="username" placeholder="username" tabindex="10" required>
                    </div>
                    <div class="form-input">
                        <span><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>

                    <input type="submit" name="login" value="masuk">
                    <!-- Notifikasi -->
                    <p><?php echo $notif; ?></p>
                </form>
            </div>
        </div>
    </div>
    <!-- FORM CONTAINER END -->
</div>

</body>

</html>
