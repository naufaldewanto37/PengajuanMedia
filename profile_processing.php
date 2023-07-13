<?php
include 'config/connection.php';
session_start();

// Mengambil data form
$id_user = $_SESSION['id_user'];

// Update Data
$set1 = "";
$set2 = "";
if (!empty($_POST['company_address'])) {
    $company_address = mysqli_real_escape_string($conn, $_POST['company_address']);
    $set1 .= "company_address = '$company_address', ";
}
if (!empty($_POST['company_name'])) {
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $set1 .= "company_name = '$company_name', ";
}
if (!empty($_POST['notelp'])) {
    $notelp = mysqli_real_escape_string($conn, $_POST['notelp']);
    $set1 .= "phone = '$notelp', ";
}
if (!empty($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $set1 .= "email = '$email', ";
    $set2 .= "email = '$email', ";
}
if (!empty($_POST['username'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $set2 .= "username = '$username', ";
}
if (!empty($_POST['password'])) {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $set2 .= "password = '$password', ";
}

// Menghilangkan koma dan spasi di akhir string $set
$set1 = rtrim($set1, ', ');
$set2 = rtrim($set2, ', ');


$result1 = $result2 = true;

// Update data pengguna
if (!empty($set1)) {
    $query1 = "UPDATE member SET $set1 WHERE id_user = '$id_user'";
    $result1 = mysqli_query($conn, $query1);
}
if (!empty($set2)) {
    $query2 = "UPDATE user SET $set2 WHERE id_user = '$id_user'";
    $result2 = mysqli_query($conn, $query2);
}

if ($result1 && $result2) {
    $_SESSION['message'] = 'Data updated successfully.';
    header('Location: profile.php');
} else {
    $_SESSION['message'] = 'Data update failed.';
    header('Location: profile.php');
}

// Ganti foto profil
$file = $_FILES['myfile']['name'];
$ext = pathinfo($file, PATHINFO_EXTENSION);
$newFileName = $id_user . "." . $ext;
$dir = "profile_member/";
$target = $dir . $newFileName;

if (move_uploaded_file($_FILES['myfile']['tmp_name'], $target)) {
    header('Location: profile.php');
} else {
    header('Location: profile.php');
}
