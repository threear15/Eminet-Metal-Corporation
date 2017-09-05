<?php
include "connection.php";

session_start();

unset($_SESSION['uid2']);

unset($_SESSION['code']);

header("location:index.php");
?>