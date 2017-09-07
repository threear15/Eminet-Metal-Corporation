<?php
include "connection.php";

session_start();

unset($_SESSION['gmail']);

unset($_SESSION['pending']);

header("location:index.php");
?>