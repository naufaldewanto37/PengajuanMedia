<?php
    include '../config/connection.php';

    if (isset($_POST['id_pengajuan'])) {
        $id_pengajuan = $_POST['id_pengajuan'];
        $target_dir = "../pengajuan/";
        $files = ['AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS'];
        $namaFile = ['Surat Permohonan Kerjasama', 'Akta Perusahaan (Akta Notaris)', 'Surat Keputusan MENKUMHAM (Kementerian Hukum dan Hak Asasi Manusia)', 
        'Struktur Organisasi Perusahaan', 'Tanda Daftar Industri (Media Cetak)', 'Bukti Terdaftar di Dewan Pers', 'KTP Pemimpin Perusahaan', 
        'Surat Kuasa (Jika Tidak Ditandatangani Langsung Oleh Pemimpin Perusahaan)', 'Surat Domisili Perusahaan', 'Daftar Harga Iklan', 
        'Fotocopy Surat Tanda Anggota (PWI/AJI) atau Organisasi Kewartawanan Lainnya', 'Memiliki BPJS Ketenagakerjaan Terhadap Wartawan', 'Surat Pernyataan Media Televisi/Radio (Jumlah Penonton/Jumlah Pendengar)', 
        'Surat Pernyataan Media Televisi/Radio (Jangkauan Siar)', 'Surat Keterangan Percetakan (Nomor yang Bisa Dihubungi)', 'Memiliki Sertifikat UKW Untuk Registrasi Online', 'Surat Izin Stasiun Radio/Surat Izin Siaran Televisi', 
        'Surat Izin Penyelenggaraan Penyiaran', 'SPT Tahun Terakhir Perusahaan'];
        $file_links = [];
    
        foreach ($files as $index => $file) {
            $filename = $file . "_" . $id_pengajuan . ".pdf";
            $target_file = $target_dir . $filename;
            if (file_exists($target_file)) {
                $file_links[] = "<a href='$target_file' target='_blank'>$namaFile[$index]</a>";
            }
        }
    
        if (empty($file_links)) {
            echo "No files uploaded.";
        } else {
            echo implode("<br>", $file_links);
        }
    }
