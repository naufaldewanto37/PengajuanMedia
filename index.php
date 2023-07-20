<?php
include "config/connection.php";
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
} else {
    if ($_SESSION['level'] == "admin") {
        include "admin-page/home_admin.php";
    } else {
        if (empty($_SESSION['company_name'])) {
            header('Location: profile.php');
            exit();
        } else {
            include "member-page/home_member.php";
        }
    }
}
?>
