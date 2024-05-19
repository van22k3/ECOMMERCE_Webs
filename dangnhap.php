<?php
require 'config.php';
session_start();
$link="";

if(!empty($_SESSION['id'])){
    $link = 'user.php';
    header("location: user.php");
}else{
    $link = 'login.php';
}


  $warn=" ";
  $stmt;
  $result;
  $script=" ";
  $script1=" ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_email =$_POST['acs-email']; 
    $login_password = $_POST['password'];


    $conn = new mysqli('localhost', 'root', '', 'project_ecommerce');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
  
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$login_email'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($login_password == $row['password']) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row['id'];
            header("Location: user.php");
            exit();
        } else {
            echo "<script>alert('WRONG PASSWORD')</script>";
        }
    } else {
        echo "<script>alert('EMAIL NOT FOUND')</script>";
    }
}

?>

<html>

<a href="<?=$link?>">GET BACK</a>
</html>