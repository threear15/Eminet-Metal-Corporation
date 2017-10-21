<?php 
include "connection.php";
session_start();

unset($_SESSION['uid_admin']);

unset($_SESSION['name_admin']);

header("location:superadmin/s_admin_login.php");
?>