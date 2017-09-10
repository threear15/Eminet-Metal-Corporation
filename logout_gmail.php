<?php
include "connection.php";

session_start();

unset($_SESSION['gmail']);

unset($_SESSION['approved']);

header("location:index.php");
?>