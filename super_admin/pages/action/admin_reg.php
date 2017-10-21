<?php
include "../connection/connection.php";

$f_name = mysqli_real_escape_string($con,$_POST['f_name']);
$l_name = $_POST['l_name'];
$m_name = $_POST['m_name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$role = $_POST['role'];
$username = $_POST['username'];
$password = $_POST['password'];
$image = $_POST['image_ko'];
$name = "/^[A-Z][a-zA-z ]+$/";
$number = "/^[0-9]+$/";
if(empty($f_name) || empty($l_name) || empty($m_name) || empty($age) || empty($gender) 
	|| empty($role) || empty($username) || empty($password)){
	echo"
			<script>
		        swal({
		          title: 'Warning',
		          text: 'Please Input All The Fields',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
	";
	exit();
}else{
	if(!preg_match($name, $f_name)){
	echo"
			<script>
		        swal({
		          title: '',
		          text: 'Type Capital Letter First',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
	";exit();
}
	if(!preg_match($name, $l_name)){
	echo"
			<script>
		        swal({
		          title: '',
		          text: 'Type Capital Letter First',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
	";exit();
}
	if(!preg_match($name, $m_name)){
	echo"
			<script>
		        swal({
		          title: '',
		          text: 'Type Capital Letter First',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
	";exit();
}
	if(!preg_match($number, $age)){
	echo"
			<script>
		        swal({
		          title: '',
		          text: 'Type Number Only',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
	";exit();
}

if(strlen($password) <= 6){
	echo"
			<script>
		        swal({
		          title: '',
		          text: 'Password is weak',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
	";exit();
}
$hash = $password;
$password_hash = password_hash($hash, PASSWORD_DEFAULT);
$sql = "SELECT * FROM super_admin WHERE username = '$username' LIMIT 1";
$run_query = mysqli_query($con,$sql);
$count = mysqli_num_rows($run_query);
if($count >= 1){
	echo"
			<script>
		        swal({
		          title: '',
		          text: 'Username was already in used!!! Try another!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
	";exit();
}else{
	$sql = "INSERT INTO `super_admin` (`id`, `role`, `f_name`, `m_name`, `l_name`, `age`, `gender`, `username`, `password`,`image`) VALUES (NULL, '$role', '$f_name', '$m_name', '$l_name', '$age', '$gender', '$username', '$password_hash','$image')";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
	echo "
			<script>
		        swal({
		          title: '',
		          text: 'Successfully Add New Admin',
		          type: 'success',
		          confirmButtonClass: 'btn-success',
		          confirmButtonText: 'Ok'
		        });
			</script>

";		
	}
}
}



 ?>