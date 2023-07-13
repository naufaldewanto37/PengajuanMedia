<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style-home_member.css">
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
            <a href="#tentang">Tentang</a>
            <a href="#bantuan">Bantuan</a>
        </div>
        <div class="dropdown">
            <img src="profile/profile_pic.png" alt="Profile" class="dropbtn" id="profile">
            <div class="dropdown-content">
                <a href="#gantiprofile">Ganti Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div class="batas"></div>
    <!-- Konten halaman -->
    <div id="content">
        <div id="image-roller">
            <img src="src/test.jpg">

        </div>
        <div id="change-image">
            <div class="circle-image"></div>
            <div class="circle-image"></div>
            <div class="circle-image"></div>
        </div>
        <button id="btn-pengajuan">Pengajuan Media</button>
    </div>
</body>

</html>