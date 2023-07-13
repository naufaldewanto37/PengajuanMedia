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
    <div class="batas"></div>
    <!-- Konten halaman -->
    <div id="content">
        <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <img src="src/test.jpg">
            </div>

            <div class="mySlides fade">
                <img src="src/test2.jpg">
            </div>

            <div class="mySlides fade">
                <img src="src/test3.jpg">
            </div>
        </div>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        
        <button id="btn-pengajuan">Pengajuan Media</button>
        <button id="btn-riwayat">Riwayat Pengajuan</button>
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
            setTimeout(showSlidesAuto, 4000); // Change image every 2 seconds
        }
    </script>

</body>

</html>