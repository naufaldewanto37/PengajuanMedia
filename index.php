<?php
include "config/connection.php";
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} else {
    echo "Welcome " . $_SESSION['username'] . "!<br>";
    echo "Your role is " . $_SESSION['level'] . ".<br>";

    if ($_SESSION['level'] == "admin") {
        echo "As an admin, you have all the privileges.";
    } else {
        echo "As a normal user, your actions are limited.";
    }

    echo "<br><a href='logout.php'>Logout</a>";
}
?>
