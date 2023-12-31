<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

$id_user = $_SESSION['id_user'];
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
    <link rel="stylesheet" href="style/style-tentang.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
            <a href="index.php">Home</a>
            <a href="tentang.php">Tentang</a>
        </div>

        <div class="dropdown dropleft float-right">
            <img src="<?php echo $profileImageUrl; ?>" alt="Profile" class="dropdown-toggle" data-toggle="dropdown" id="profile" aria-expanded="false">
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.php">Ganti Profile</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </div>

    </div>

    <div class="content">
        <p id="penjelasan-isi">SIMANIS KOTA BANDAR LAMPUNG merupakan sistem media komunikasi dan informasi kota bandar lampung yang bertujuan sebagai platform pengajuan kerjasama media elektronik dengan kominfo kota bandar lampung. Website ini memiliki beberapa fitur yang dapat digunakan seperti fitur pengajuan kerjasama, riwayat pengajuan kerjasama dan upload hasil liputan.</p>
        <p id="persyaratan-judul">Persyaratan Pengajuan Kerja Sama</p>
        <p id="persyaratan-isi">
            1. Surat Permohonan atau Penawaran Kerjasama Media yang Ditujukan Kepada Wali Kota Bandar Lampung Melalui Diskominfo Kota Bandar Lampung<br>
            2. Akta Perusahaan (Akta Notaris)<br>
            3. Surat Keputusan MENKUMHAM Tentang Pengesahan Badan hukum<br>
            4. Struktur Organisasi Perusahaan<br>
            5. Alamat Resmi Perusahaan<br>
            6. Nomor Induk Berusaha (NIB)<br>
            7. NPWP Perusahaan<br>
            8. Referensi Bank dan Nomor Rekening Bank Milik Perusahaan<br>
            9. Tanda Daftar Industri (Media Cetak)<br>
            10. Terdaftar di Dewan Pers<br>
            11. KTP Pemimpin Perusahaan<br>
            12. Surat Kuasa (Jika Tidak Ditandatangani Langsung Oleh Pemimpin Perusahaan)<br>
            13. Surat Domisili Perusahaan<br>
            14. Daftar Harga Iklan<br>
            15. Fotocopy Surat Tanda Anggota (PWI/AJI) atau Organisasi Kewartawanan Lainnya<br>
            16. Memiliki BPJS Ketenagakerjaan Terhadap Wartawan<br>
            17. Surat Pernyataan<br>
            &nbsp;&nbsp;A. Media Televisi<br>
            &nbsp;&nbsp;&nbsp;. Jumlah Penontonn<br>
            &nbsp;&nbsp;&nbsp;. Jangkauan Siar<br>
            &nbsp;&nbsp;B. Media Radio<br>
            &nbsp;&nbsp;&nbsp;.Jumlah Pendengar<br>
            &nbsp;&nbsp;&nbsp;.Jangkauan Siar<br>
            18. Surat Keterangan Percetakan (Nomor yang Bisa Dihubungi)<br>
            19. Memiliki Sertifikat UKW Untuk Registrasi Online<br>
            20. Memiliki Izin Penyelenggaran Penyiaran (IPP Tetap)<br>
            21. Memiliki Izin Stasiun Radio<br>
            22. Memiliki Izin Siaran Televisi<br>
            23. SPT Tahun Terakhir Perusahaan<br>
            24. Khusus Media Televisi, Tayangan Harus Dapat di Akses oleh Masyarakat Melalui Media Televisi (Bukan Televisi Streaming) </p>
    </div>

</body>

</html>