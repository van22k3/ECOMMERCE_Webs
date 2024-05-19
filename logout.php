<?php
session_start(); // Bắt đầu session

require 'config.php'; // Yêu cầu tệp cấu hình nếu cần thiết

// Hủy tất cả các biến session
$_SESSION = [];
session_unset();
session_destroy(); // Hủy session

// Chuyển hướng về trang đăng nhập
header("Location: login.php");
exit();
?>
