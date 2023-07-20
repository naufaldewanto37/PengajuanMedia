<?php
include 'config/connection.php';
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style-home_member.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Layanan Pengajuan Media Online</title>
</head>

<body>
    <div class="navbar">
        <div id="logo-nama">
            <img src="src/kominfo.png" id="kominfo-img">
            <p id="nama-app">SI</p>
        </div>
        <div id="navbar-content">
            <a href="index.php">Home</a>
            <a href="tentang.php">Tentang</a>
            <a href="bantuan.php">Bantuan</a>
        </div>
        <div class="dropdown">
            <img src="profile/profile_pic.png" alt="Profile" data-bs-toggle="dropdown" id="profile" aria-expanded="false">
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profile.php">Ganti Profile</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

</body>

</html>