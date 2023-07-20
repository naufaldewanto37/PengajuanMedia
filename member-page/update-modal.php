<?php
include "../config/connection.php";
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: ../login.php');
    exit();
}
$id_pengajuan = $_SESSION['id_pengajuan'];
$id_hasil = $_POST['id_hasil'];
$judul = $_POST['judul'];
$link = $_POST['link'];
$keterangan = $_POST['keterangan'];
$sql = "SELECT * FROM hasilliputan where id_hasil = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id_hasil);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$tglUpload = date('Y-m-d H:i:s');

$query = "UPDATE hasilliputan SET judul = '$judul', link = '$link', keterangan = '$keterangan' WHERE id_hasil = '$id_hasil'";
$result = mysqli_query($conn, $query);

header('Location: pengajuanterima.php?id_pengajuan=' . urlencode($id_pengajuan));