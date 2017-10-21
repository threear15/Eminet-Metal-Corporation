<?php 
include "connection.php";
session_start();

unset($_SESSION['uid_admin1']);
header("location:s_admin_login1.php");
?>