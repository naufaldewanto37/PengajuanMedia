<?php
include "../config/connection.php";
session_start();

$id_user = $_SESSION['id_user'];
$level = $_SESSION['level'];

if (!isset($_SESSION['id_user']) || $level != 'admin') {
    header('Location: ../index.php');
    exit();
}

if (isset($_POST['id_user']) && isset($_POST['action'])) {
    $id_pengajuan = $_POST['id_pengajuan'];
    $status = $_POST['action'] === 'approve' ? 'DiSetuju' : 'DiTolak';
    $keterangan = $_POST['keterangan'];
    date_default_timezone_set("Asia/Jakarta");
    $tglterima = date('Y-m-d H:i:s');


    $query = "UPDATE pengajuan SET status = '$status', keterangan = '$keterangan', tglterima ='$tglterima' WHERE id_pengajuan = '$id_pengajuan'";
    $result = mysqli_query($conn, $query);
    header('Location: list-pengajuan.php');
}
?>
