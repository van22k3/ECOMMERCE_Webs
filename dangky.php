<?php
session_start(); // Bắt đầu session
$link="";

if(!empty($_SESSION['id'])){
    $link = 'user.php';
    header("location: user.php");
}else{
    $link = 'login.php';
}
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["rq-password"];
  $email = $_POST["email"];
 
    $conn = new mysqli('localhost', 'root', '', 'project_ecommerce');

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    $duplicate = mysqli_query($conn,"SELECT * FROM users WHERE username ='$username' OR email='$email' ");
    if(mysqli_num_rows($duplicate)){
       $warn = 'username or email had been taken';
        echo "<script>alert('USERNAME OR EMAIL HAD BEEN TAKEN')</script>";
       
    }else{
      if($username !=null && $email!=null && $password!=null){
        $query = "INSERT INTO users (username,email,password,cart_products) VALUES ('$username','$email','$password','[]')";
        mysqli_query($conn,$query);
        echo "<script>alert('ACCOUNT CREATED')</script>";
        
      }
    }

}

?>

<html>

<a href="<?=$link?>">GET BACK</a>
</html>