<?php
include "../config/connection.php";
session_start();

if (!isset($_SESSION['level'])) {
    header('Location: ../index.php');
    exit();
}

$level = $_SESSION['level'];

if (!isset($_SESSION['id_user']) || $level != 'admin') {
    header('Location: ../index.php');
    exit();
}

$error_message = '';
$succsess_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['username']) && trim($_POST['username']) !== '' &&
        isset($_POST['password']) && trim($_POST['password']) !== '' &&
        isset($_POST['confirm_password']) && trim($_POST['confirm_password']) !== ''
    ) {
        $id_user = uniqid();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            $error_message = 'Password and confirm password do not match.';
        } else {
            $check_query = "SELECT * FROM user WHERE username = ?";
            $check_stmt = $conn->prepare($check_query);
            $check_stmt->bind_param("s", $username);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();
            if ($check_result->num_rows > 0) {
                $error_message = 'Username already registered!';
            }
            $check_stmt->close();
            $conn->begin_transaction();

            $query = "INSERT INTO user (id_user, username, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss", $id_user, $username, $password);
            $stmt->execute();
            $stmt->close();

            $query2 = "INSERT INTO member (id_user) VALUES (?)";
            $stmt = $conn->prepare($query2);
            $stmt->bind_param("s", $id_user);
            $stmt->execute();
            $stmt->close();

            $conn->commit();
            $succsess_message = 'User has been created successfully.';
        }
    } else {
        $error_message = 'Tolong Lengkapi Form';
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
    <link rel="stylesheet" href="../style/style-daftar.css">
    <title>Layanan Pengajuan Media Online</title>
</head>

<body>
    <div class="navbar">
        <a href="../index.php" style="text-decoration: none; color:white">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                <g clip-path="url(#clip0_229_133)">
                    <path d="M4.9245 16.4096C4.50315 16.8315 4.26648 17.4033 4.26648 17.9996C4.26648 18.5958 4.50315 19.1677 4.9245 19.5896L13.4085 28.0781C13.8306 28.5002 14.4031 28.7373 15 28.7373C15.5969 28.7373 16.1694 28.5002 16.5915 28.0781C17.0136 27.656 17.2507 27.0835 17.2507 26.4866C17.2507 25.8897 17.0136 25.3172 16.5915 24.8951L11.9475 20.2496H29.25C29.8467 20.2496 30.419 20.0125 30.841 19.5906C31.2629 19.1686 31.5 18.5963 31.5 17.9996C31.5 17.4028 31.2629 16.8306 30.841 16.4086C30.419 15.9866 29.8467 15.7496 29.25 15.7496L11.9475 15.7496L16.5915 11.1056C16.8005 10.8966 16.9663 10.6485 17.0794 10.3754C17.1925 10.1023 17.2507 9.80965 17.2507 9.51408C17.2507 9.21852 17.1925 8.92584 17.0794 8.65277C16.9663 8.3797 16.8005 8.13158 16.5915 7.92258C16.3825 7.71358 16.1344 7.5478 15.8613 7.43469C15.5882 7.32158 15.2956 7.26336 15 7.26336C14.7044 7.26336 14.4118 7.32158 14.1387 7.43469C13.8656 7.5478 13.6175 7.71358 13.4085 7.92258L4.9245 16.4096Z" fill="white" />
                </g>
                <defs>
                    <clipPath id="clip0_229_133">
                        <rect width="36" height="36" fill="white" transform="matrix(0 -1 1 0 0 36)" />
                    </clipPath>
                </defs>
            </svg>
        </a>
    </div>
    <div id="bodypage">
        <h1 id="judul">Penambahan Media Baru </h1>
        <div id="form">
            <div class="rectangle-daftar">
                <div>
                    <form method="post" action="">
                        <h2 id="text-login">Penambahan Media</h2>
                        <label for="username" class="label-user">Username:</label>
                        <input type="text" placeholder="Username..." class="login-box" name="username"><br>
                        <label for="password" class="label-user">Password:</label>
                        <input type="password" placeholder="Password..." class="login-box" name="password"><br>
                        <label for="username" class="label-user">Konfirmasi Password:</label>
                        <input type="password" placeholder="Konfirmasi Password..." class="login-box" id="confirm_password" name="confirm_password"><br>
                        <input type="submit" value="Register" id="btn-login">
                        <?php
                        if ($error_message != '') {
                            echo '<p style="color:red;">' . $error_message . '</p>';
                        } elseif ($succsess_message != '') {
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