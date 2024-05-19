<?php

require 'config.php';
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
  
    $result = mysqli_query($conn,"SELECT * FROM users WHERE email = '$login_email'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
      if($login_password==$row['password']){
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row['id'];
        header("Location: user.php");
        echo 'dang nhap thanh cong';
      }else{
        echo "<script>alert('WRONG PASSWORD PLS GET BACK')</script>";
      }
    }else{
        echo "<script>alert('ACCOUNT NOT EXITED PLS GET BACK')</script>";
    }
}

?>