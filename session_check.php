<?php
session_start();

function checkLogin() {
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('You need to be logged in to book a room.'); window.location.href='login.php';</script>";
        exit();
    }
}
?>