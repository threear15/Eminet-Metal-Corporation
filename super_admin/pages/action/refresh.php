<?php 
include "../connection/connection.php";

if(isset($_POST['refresh'])){
	session_start();
	GLOBAL $con;
	$password_verify = $_SESSION['password'];

	$sql = "SELECT * FROM super_admin WHERE password = '$password_verify' AND id =".$_SESSION['admin_id'];
	$run_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($run_query);
			$id = $row['id'];
			$role = $row['role'];
			$_SESSION['admin_id'] = $row['id'];
			$_SESSION['f_name'] = $row['f_name'];
			$_SESSION['m_name'] = $row['m_name'];
			$_SESSION['l_name'] = $row['l_name'];
			$_SESSION['image'] = $row['image'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
	if(password_verify($password_verify, $row['password'])){
		echo "true";
	}

 }
 ?>