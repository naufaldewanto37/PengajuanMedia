<?php
include "config/connection.php";
session_start();

$error_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user JOIN member ON user.id_user = member.id_user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($user['password'] == $password) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['level'] = $user['level'];
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['company_name'] = $user['company_name'];
                header('Location: index.php');
            } else {
                $error_message = 'Password Salah, Silahkan Ulangi.';
            }
        } else {
            $error_message = 'Username Salah, Silahkan Ulangi.';
        }

        $stmt->close();
    } else {
        $error_message = 'Tolong Masukan Akun.';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style-login.css">
    <title>Layanan Pengajuan Media Online</title>
</head>

<body>
    <div id="bodypage">

        <img src="https://upload.wikimedia.org/wikipedia/id/6/6a/LOGO_KOTA_BANDAR_LAMPUNG_BARU.png" style="
        width: 14.875rem;
        height: 17.75rem;
        flex-shrink: 0;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 3.313rem;">

        <h1 id="judul">Layanan pengajuan Media Online
            Kota Bandar Lampung </h1>
        <div id="form">
            <div class="rectangle">
                <!-- Form login -->
                <div>
                    <form method="post" action="">
                        <h2 id="text-login">SELAMAT DATANG!</h2>
                        <p id="bantuan">SEBELUM Masuk kE DALAM wEBSITE Silahkan Baca Terlebih dahulu Alur Pengajuan <a href="bantuan.php" style="color: #3F6CDF;">Disini</a></p>
                        <label for="username" class="label-user">Username:</label>
                        <input type="text" placeholder="Username" class="login-box" name="username"><br>
                        <label for="password" class="label-user">Password:</label>
                        <input type="password" placeholder="Password" class="login-box" name="password"><br>
                        <input type="submit" value="Masuk" id="btn-login">
                    </form>
                    <?php
                    if ($error_message != '') {
                        echo '<p style="color:red;">' . $error_message . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>