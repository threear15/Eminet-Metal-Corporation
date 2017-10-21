<?php 
include "../connection/connection.php";
session_start();
if(isset($_POST['total_customers'])){
	$sql = "SELECT * FROM user";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}
if(isset($_POST['total_customers_males'])){
	$sql = "SELECT * FROM user WHERE gender ='Male'";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}
if(isset($_POST['total_customers_females'])){
	$sql = "SELECT * FROM user WHERE gender ='Female'";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}
if(isset($_POST['total_superadmin'])){
	$sql = "SELECT * FROM super_admin WHERE role ='Super Admin'";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}
if(isset($_POST['total_admin'])){
	$sql = "SELECT * FROM super_admin WHERE role ='Admin'";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}
if(isset($_POST['total_products'])){
	$sql = "SELECT * FROM product";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}
if(isset($_POST['total_messages'])){
	$sql = "SELECT * FROM message WHERE status = 'Pending'";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}

?>