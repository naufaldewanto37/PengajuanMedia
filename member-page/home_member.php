<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: ../login.php');
    exit();
} else if ($_SESSION['level'] === 'admin') {
    header('Location: ../index.php');
    exit();
}

$id_user = $_SESSION['id_user'];
// $sql = "SELECT * FROM user WHERE id_user = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("s", $id_user);
// $stmt->execute();
// $result = $stmt->get_result();
// $user = $result->fetch_assoc();
// $_SESSION['level'] = $user['level'];
// $level = $_SESSION['level'];
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
    <link rel="stylesheet" href="style/style-home_member.css">
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
    <!-- Konten halaman -->
    <div id="content">
        <!-- Slideshow container -->
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

        <a href="member-page/tambah_pengajuan.php" id="btn-pengajuan">Kerjasama Media</a>
        <a href="member-page/riwayat-pengajuan.php" id="btn-riwayat">Riwayat Pengajuan</a>
    </div>

    <div class="footer dropleft">
        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 65 65" fill="none" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <path d="M29.7917 48.7501H35.2083V43.3334H29.7917V48.7501ZM32.5 5.41675C28.9434 5.41675 25.4215 6.11728 22.1356 7.47834C18.8497 8.83941 15.8641 10.8344 13.3492 13.3493C8.27007 18.4284 5.41666 25.3171 5.41666 32.5001C5.41666 39.683 8.27007 46.5718 13.3492 51.6509C15.8641 54.1658 18.8497 56.1608 22.1356 57.5218C25.4215 58.8829 28.9434 59.5834 32.5 59.5834C39.6829 59.5834 46.5717 56.73 51.6508 51.6509C56.7299 46.5718 59.5833 39.683 59.5833 32.5001C59.5833 28.9434 58.8828 25.4216 57.5217 22.1357C56.1607 18.8498 54.1657 15.8642 51.6508 13.3493C49.1359 10.8344 46.1502 8.83941 42.8643 7.47834C39.5784 6.11728 36.0566 5.41675 32.5 5.41675ZM32.5 54.1668C20.5562 54.1668 10.8333 44.4438 10.8333 32.5001C10.8333 20.5563 20.5562 10.8334 32.5 10.8334C44.4437 10.8334 54.1667 20.5563 54.1667 32.5001C54.1667 44.4438 44.4437 54.1668 32.5 54.1668ZM32.5 16.2501C29.6268 16.2501 26.8713 17.3914 24.8397 19.4231C22.808 21.4547 21.6667 24.2102 21.6667 27.0834H27.0833C27.0833 25.6468 27.654 24.2691 28.6698 23.2533C29.6857 22.2374 31.0634 21.6667 32.5 21.6667C33.9366 21.6667 35.3143 22.2374 36.3302 23.2533C37.346 24.2691 37.9167 25.6468 37.9167 27.0834C37.9167 32.5001 29.7917 31.823 29.7917 40.6251H35.2083C35.2083 34.5313 43.3333 33.8542 43.3333 27.0834C43.3333 24.2102 42.192 21.4547 40.1603 19.4231C38.1287 17.3914 35.3732 16.2501 32.5 16.2501Z" fill="white" />
        </svg>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <p class="dropdown-item" href="#" id="p-footer">perlu Bantuan ?</p>
            <a class="dropdown-item" href="bantuan.php" id="a-footer">klik disini</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        let slideIndex = 1;

        // Thumbnail image controls
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
