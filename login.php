<?php
include "config/connection.php";
session_start();

$error_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($user['password'] == $password) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['level'] = $user['level'];
                header('Location: index.php');
            } else {
                $error_message = 'Invalid password. Please try again.';
            }
        } else {
            $error_message = 'Invalid username. Please try again.';
        }

        $stmt->close();
    } else {
        $error_message = 'Please enter your login credentials.';
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
            <!-- Persegi Panjang di bawah form login -->
            <div class="rectangle">
                <!-- Form login -->
                <div>
                    <form method="post" action="">
                        <h2 id="text-login">SELAMAT DATANG!</h2>
                        <label for="username" class="label-user">Username:</label>
                        <input type="text" placeholder="Username" class="login-box" name="username"><br>
                        <label for="password" class="label-user">Password:</label>
                        <input type="password" placeholder="Password" class="login-box" name="password"><br>
                        <input type="submit" value="Masuk" id="btn-login">
                        <p id="text-daftar">Belum Memiliki Akun? <a style="
                        color: #3F6CDF;
                        font-family: Roboto;
                        font-size: 1rem;
                        font-style: normal;
                        font-weight: 400;
                        line-height: 1.71875rem;
                        text-decoration: none;" href="daftar.php">Daftar Sekarang</a>.</p>
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