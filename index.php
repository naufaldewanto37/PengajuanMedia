<?php
include "config/connection.php";
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} else {
    if ($_SESSION['level'] == "admin") {
        include "home_admin.php";
    } else {
        include "home_member.php";
    }
}
?>
