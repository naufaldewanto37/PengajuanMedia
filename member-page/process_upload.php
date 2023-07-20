<?php
include '../config/connection.php';
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: ../login.php');
    exit();
}

$id_user = $_SESSION['id_user'];

$target_dir = "pengajuan/";

foreach ($_FILES as $fieldName => $file) {
    $target_file = $target_dir . basename($file["name"]);

    $new_filename = $fieldName . "_" . $id_user . ".pdf";
    $target_file = $target_dir . $new_filename;

    if (file_exists($target_file)) {
        continue;
    }

    // Try to upload file
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        header('Location: tambah_pengajuan2.php');
    }
}

$id_pengajuan = uniqid();
date_default_timezone_set("Asia/Jakarta");
$tglaju = date('Y-m-d H:i:s');
$status = 'Menunggu';

$query = "INSERT INTO pengajuan (id_pengajuan, id_user, status, tglterima, tglaju) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssss", $id_pengajuan, $id_user, $status, $tglterima, $tglaju);
$stmt->execute();
$stmt->close();

// If both inserts were successful, commit the transaction
$conn->commit();
$conn->close();
