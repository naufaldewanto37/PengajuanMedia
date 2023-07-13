<?php
include "config/connection.php";
session_start();

$num1 = rand(1, 10);
$num2 = rand(1, 10);
$captchaResult = $num1 + $num2;
$_SESSION['captcha'] = $captchaResult;

$error_message = '';
$succsess_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nik']) && isset($_POST['full_name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['phone']) && isset($_POST['email'])) {
        $nik = $_POST['nik'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        if ($password !== $confirm_password) {
            $error_message = 'Password and confirm password do not match.';
        } else {
            $check_query = "SELECT * FROM user WHERE nik = ?";
            $check_stmt = $conn->prepare($check_query);
            $check_stmt->bind_param("s", $nik);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();
            if ($check_result->num_rows > 0) {
                $error_message = 'NIK already registered!';
            }
            $check_stmt->close();
            $conn->begin_transaction();

            try {
                // Insert into users table
                $query = "INSERT INTO user (nik, username, password, email) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssss", $nik, $username, $password, $email);
                $stmt->execute();
                $stmt->close();

                // Insert into profiles table
                $query = "INSERT INTO member (nik, full_name, phone, email) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssss", $nik, $full_name, $phone, $email);
                $stmt->execute();
                $stmt->close();

                // If both inserts were successful, commit the transaction
                $conn->commit();
                $succsess_message = 'User has been created successfully.';
            } catch (\Exception $e) {
                // If any errors occurred, rollback the transaction
                $conn->rollback();
            }
        }
    }
} else {
    echo "No POST data received.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style-daftar.css">
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
            <div class="rectangle-daftar">
                <!-- Form login -->
                <div>
                    <form method="post" action="">
                        <h2 id="text-login">SELAMAT DATANG!</h2>
                        <label for="username" class="label-user">Nomor Induk Penduduk (NIK):</label>
                        <input type="text" placeholder="NIK..." class="login-box" name="nik"><br>
                        <label for="username" class="label-user">Nama Lengkap:</label>
                        <input type="text" placeholder="Nama Lengkap.." class="login-box" name="full_name"><br>
                        <label for="username" class="label-user">Username:</label>
                        <input type="text" placeholder="Username..." class="login-box" name="username"><br>
                        <label for="password" class="label-user">Password:</label>
                        <input type="password" placeholder="Password..." class="login-box" name="password"><br>
                        <label for="username" class="label-user">Konfirmasi Password:</label>
                        <input type="password" placeholder="Konfirmasi Password..." class="login-box" id="confirm_password" name="confirm_password"><br>
                        <label for="username" class="label-user">Nomor Telephone:</label>
                        <input type="text" placeholder="Nomor Telephone..." class="login-box" name="phone"><br>
                        <label for="username" class="label-user">Email:</label>
                        <input type="text" placeholder="Email..." class="login-box" name="email"><br>
                        <input type="submit" value="Register" id="btn-login">
                        <p id="text-daftar">Sudah Memiliki Akun? <a style="
                        color: #3F6CDF;
                        font-family: Roboto;
                        font-size: 1rem;
                        font-style: normal;
                        font-weight: 400;
                        line-height: 1.71875rem;" href="login.php">Masuk</a>.</p>
                        <?php
                        if ($error_message != '') {
                            echo '<p style="color:red;">' . $error_message . '</p>';
                        }elseif($succsess_message != ''){
                            echo '<p style="color:green;">' . $succsess_message . '</p>';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>