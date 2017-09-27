<?php
include "connection.php";
session_start();
unset($_SESSION['uid']);

unset($_SESSION['name']);

unset($_SESSION['gmail']);

header("location:index.php");

	


?>