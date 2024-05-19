<?php
require 'config.php';
$_SESSION = [];
session_unset();

header("location.php");
?>