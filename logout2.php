<?php
include "connection.php";

session_start();

unset($_SESSION['uid2']);

header("location:index.php");
?>