<?php 
include "connection.php";
session_start();

unset($_SESSION['uid_admin1']);

unset($_SESSION['name_admin1']);

header("location:admin/s_admin_login1.php");
?>