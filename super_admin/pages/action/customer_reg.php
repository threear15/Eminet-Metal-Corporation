<?php
include "../connection/connection.php";

$f_name = mysqli_real_escape_string($con,$_POST['f_name1']);
$l_name = $_POST['l_name1'];
$m_name = $_POST['m_name1'];
$age = $_POST['age1'];
$gender = $_POST['gender1'];
$tel = $_POST['tel1'];
$email = $_POST['email1'];
$phone = $_POST['phone1'];
$h_address = $_POST['h_address1'];
$city = $_POST['city1'];
$brgy = $_POST['brgy1'];
$status = $_POST['status1'];
$password = $_POST['password1'];
$name = "/^[A-Z][a-zA-z ]+$/";
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";
if(empty($f_name) || empty($l_name) || empty($m_name) || empty($age) || empty($gender) 
	 || empty($email) || empty($phone) || empty($h_address) 
	|| empty($city) || empty($password) || empty($brgy) || empty($tel)){
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
		          text: '$f_name was invalid !!! Type Capital Letter First',
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
		          text: '$l_name was invalid !!! Type Capital Letter First',
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
		          text: '$m_name was invalid !!! Type Capital Letter First',
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
		          text: '$age was invalid!!! Type Number Only',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
	";exit();
}
	if(!preg_match($number, $phone)){
	echo"
			<script>
		        swal({
		          title: '',
		          text: '$phone was invalid!!! Type Number Only',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
	";exit();
}	
	if(!preg_match($emailValidation, $email)){
	echo"
			<script>
		        swal({
		          title: '',
		          text: 'Invalid G-mail Address',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
	";exit();
}
	if(!strlen($phone) == 10){
	echo"
			<script>
		        swal({
		          title: '',
		          text: '$phone was invalid!!! Phone must be 10 digits',
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
$sql = "SELECT * FROM user WHERE gmail = '$email' LIMIT 1";
$run_query = mysqli_query($con,$sql);
$count = mysqli_num_rows($run_query);
if($count == 1){
	echo"
			<script>
		        swal({
		          title: '',
		          text: 'G-mail was already in used!!! Try another!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
	";exit();
}else{
	$hash = $password;
	$password_hash = password_hash($hash, PASSWORD_DEFAULT);
	$sql = "INSERT INTO `user` (`id`, `status`, `f_name`, `m_name`, `l_name`, `age`, `gender`, `m_number`, `tel_number`, `brgy`, `city`, `h_address`, `gmail`, `password`, `code`, `date`) 
			VALUES (NULL, '$status', '$f_name', '$m_name', '$l_name', '$age', '$gender', '$phone', '$tel', '$brgy', '$city', '$h_address', '$email', '$password_hash', '', CURRENT_TIMESTAMP);";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
	echo "
			<script>
		        swal({
		          title: '',
		          text: 'Successfully Add New Customer',
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