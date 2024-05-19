<?php
session_start(); // Bắt đầu session
require 'config.php';

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $conn = new mysqli('localhost', 'root', '', 'project_ecommerce');
    
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // User is authenticated, display user information or dashboard
        echo "Welcome, " . $row['username'];
    } else {
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
</head>
<body>
    <!-- User content -->
</body>
</html>
