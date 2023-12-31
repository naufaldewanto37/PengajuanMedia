<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

$level = $_SESSION['level'];
if (!isset($_SESSION['id_user']) || $level != 'admin') {
    header('Location: ../index.php');
    exit();
}

$id_user = $_SESSION['id_user'];
$sql = "SELECT * FROM user WHERE id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id_user);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$_SESSION['level'] = $user['level'];
$level = $_SESSION['level'];
$profileImageUrl = "profile_member/" . $id_user . ".png";
if (!file_exists($profileImageUrl)) {
    $profileImageUrl = "profile_member/no-picture.png";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style-home_admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Layanan Pengajuan Media Online</title>
</head>

<body>

<div class="navbar fixed-top">
        <div id="logo-nama">
            <img src="src/kominfo.png" id="kominfo-img">
            <div id="nama-app">
                <p style="margin-bottom: 0rem;">SIKMANIS BANDAR LAMPUNG</p>
                <p id="nama-app2">Sistem Kendali Media Komunikasi dan Informasi</p>
            </div>
        </div>
        <div id="navbar-content">
            <a href="./index.php">Home</a>
            <a href="./tentang.php">Tentang</a>
        </div>

        <div class="dropdown dropleft float-right">
            <img src="<?php echo $profileImageUrl; ?>" alt="Profile" class="dropdown-toggle" data-toggle="dropdown" id="profile" aria-expanded="false">
            <div class="dropdown-menu">
                <a class="dropdown-item" href="./profile.php">Ganti Profile</a>
                <a class="dropdown-item" href="./logout.php">Logout</a>
            </div>
        </div>

    </div>
    
    <div id="content">
    <div class="image-container">
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <img src="src/1.jpg">
                </div>

                <div class="mySlides fade">
                    <img src="src/2.jpg">
                </div>

                <div class="mySlides fade">
                    <img src="src/3.jpg">
                </div>

                <!-- The dots/circles -->
                <div id="dot">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>
            <br>

            <img src="https://upload.wikimedia.org/wikipedia/id/6/6a/LOGO_KOTA_BANDAR_LAMPUNG_BARU.png" id="img-bdl">
            <img src="src/kominfo.png" id="img-kominfo">
        </div>

        <a href="admin-page/list-pengajuan.php" id="btn-pengajuan">List Pengajuan</a>
        <a href="admin-page/daftar.php" id="btn-tambah">Tambah Media</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        let slideIndex = 1;

        function currentSlide(n) {
            showSlidesDot(slideIndex = n);
        }

        function showSlidesDot(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
        showSlidesAuto();

        function showSlidesAuto() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlidesAuto, 4000);
        }
    </script>

</body>

</html>
