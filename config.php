<?php
    $conn = new mysqli('localhost','root','','project_ecommerce');
    if($conn->connect_error){
        die("connection Failed".$conn->error);
    }
?>