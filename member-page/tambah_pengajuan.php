<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
include "../config/connection.php";

if (!isset($_SESSION['id_user'])) {
    header('Location: ../login.php');
    exit();
}

$id_user = $_SESSION['id_user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style-tambah-pengajuan.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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

    <div class="container">
        <div class="progress-container">
            <div class="circleOn">
                <p>1</p>
            </div>
            <div class="line"></div>
            <div class="circle">
                <p>2</p>
            </div>
            <div class="line"></div>
            <div class="circle">
                <p>3</p>
            </div>
        </div>



        <div id="rectangle">
            <p id="judul">FORM PENGAJUAN KERJA SAMA MEDIA </p>
            <div class="rectangle-red ml-4 mt-1">
                <p class="text-redrect">Harap Baca Keterangan di Bawah ini Terlebih Dahulu Sebelum Mengupload File</p>
                <p class="text-redrect">* : File Wajib di Upload</p>
                <p class="text-redrect">** : Opsional (File Wajib di Upload Jika Tidak Memenuhi Kondisi Tertentu)</p>
                <p id="text-redrect">Semua File di Upload dengan Format .PDF</p>
            </div>
            <form method="post" action="process_upload.php" enctype="multipart/form-data">
                <div class="form-group ml-3 mt-3">
                    <label for="AA">1. Surat Permohonan Kerjasama <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AA" required accept="application/pdf">
                </div>
                <div class="form-group ml-3">
                    <label for="AB">2. Akta Perusahaan (Akta Notaris) <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AB" required accept="application/pdf">
                </div>
                <div class="form-group ml-3">
                    <label for="AC">3. Surat Keputusan MENKUMHAM (Kementerian Hukum dan Hak Asasi Manusia) <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AC" required accept="application/pdf">
                </div>
                <div class="form-group ml-3">
                    <label for="AD">4. Struktur Organisasi Perusahaan <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AD" required accept="application/pdf">
                </div>
                <div class="form-group ml-3 mt-3">
                    <label for="AE">5. Tanda Daftar Industri (Media Cetak) <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AE" required accept="application/pdf">
                </div>
                <div class="form-group ml-3">
                    <label for="AF">6. Bukti Terdaftar di Dewan Pers <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AF" required accept="application/pdf">
                </div>
                <div class="form-group ml-3">
                    <label for="AG">7. KTP Pemimpin Perusahaan <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AG" required accept="application/pdf">
                </div>
                <div class="form-group ml-3">
                    <label for="AH">8. Surat Kuasa (Jika Tidak Ditandatangani Langsung Oleh Pemimpin Perusahaan) <span style="color:red;">**</span></label>
                    <input type="file" class="form-control-file" name="AH" accept="application/pdf">
                </div>
                <div class="form-group ml-3 mt-3">
                    <label for="AI">9. Surat Domisili Perusahaan <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AI" required accept="application/pdf">
                </div>
                <div class="form-group ml-3">
                    <label for="AJ">10. Daftar Harga Iklan* <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AJ" required accept="application/pdf">
                </div>
                <div class="form-group ml-3">
                    <label for="AK">11. Fotocopy Surat Tanda Anggota (PWI/AJI) atau Organisasi Kewartawanan Lainnya <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AK" required accept="application/pdf">
                </div>
                <div class="form-group ml-3">
                    <label for="AL">12. Memiliki BPJS Ketenagakerjaan Terhadap Wartawan <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AL" required accept="application/pdf">
                </div>
                <div class="form-group ml-3 mt-3">
                    <label for="AM">13. Surat Pernyataan Media Televisi/Radio (Jumlah Penonton/Jumlah Pendengar) <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AM" required accept="application/pdf">
                </div>
                <div class="form-group ml-3">
                    <label for="AN">14. Surat Pernyataan Media Televisi/Radio (Jangkauan Siar) <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AN" required accept="application/pdf">
                </div>
                <div class="form-group ml-3">
                    <label for="AO">15. Surat Keterangan Percetakan (Nomor yang Bisa Dihubungi) <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AO" required accept="application/pdf">
                </div>
                <div class="form-group ml-3">
                    <label for="AP">16. Memiliki Sertifikat UKW Untuk Registrasi Online <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AP" required accept="application/pdf">
                </div>
                <div class="form-group ml-3 mt-3">
                    <label for="AQ">17. Surat Izin Stasiun Radio/Surat Izin Siaran Televisi <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AQ" required accept="application/pdf">
                </div>
                <div class="form-group ml-3">
                    <label for="AR">18. Surat Izin Penyelenggaraan Penyiaran (IPP Tetap) <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AR" required accept="application/pdf">
                </div>
                <div class="form-group ml-3">
                    <label for="AS">19. SPT Tahun Terakhir Perusahaan <span style="color:red;">*</span></label>
                    <input type="file" class="form-control-file" name="AS" required accept="application/pdf">
                </div>
                <button type="submit" class="btn btn-danger mb-5 mr-3" style="float:right">Submit</button>
                <?php
                error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
                session_start();
                $message = $_SESSION['message'];
                if (isset($_SESSION['message'])) {
                    echo '<p id="message-profile" style="color:red">' . $_SESSION['message'] . '</p>';
                    unset($_SESSION['message']);
                } ?>
            </form>
        </div>
    </div>


</body>

</html>