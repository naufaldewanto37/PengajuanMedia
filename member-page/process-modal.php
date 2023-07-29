<?php
include "../config/connection.php";
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: ../login.php');
    exit();
}
$id_pengajuan = $_SESSION['id_pengajuan'];
$id_user = $_SESSION['id_user'];
$sql = "SELECT * FROM user JOIN member ON user.id_user = member.id_user JOIN pengajuan ON pengajuan.id_user = user.id_user WHERE user.id_user = ? AND pengajuan.id_pengajuan = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $id_user, $id_pengajuan);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$_SESSION['status'] = $user['status'];
$_SESSION['id_pengajuan'] = $user['id_pengajuan'];
$_SESSION['company_name'] = $user['company_name'];
$_SESSION['tglterima'] = $user['tglterima'];

$id_hasil = uniqid();
$judul = $_POST['judul'];
$link = $_POST['link'];
$keterangan = $_POST['keterangan'];
$tglUpload = date('Y-m-d H:i:s');

$query = "INSERT INTO hasilliputan (id_hasil, id_pengajuan, judul, link, keterangan, tglUpload) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssss", $id_hasil, $id_pengajuan, $judul, $link, $keterangan, $tglUpload);
$stmt->execute();
$stmt->close();

$conn->commit();
$conn->close();

header('Location: pengajuanterima.php?id_pengajuan=' . urlencode($id_pengajuan));