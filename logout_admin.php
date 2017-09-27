<?php 
include "connection.php";
session_start();

unset($_SESSION['uid_admin']);



header("location:s_admin_login.php");
?>