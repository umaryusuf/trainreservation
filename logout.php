<?php  
session_start();

unset($_SESSION['username']);
unset($_SESSION['is_logged']);

header("location: login.php");
?>