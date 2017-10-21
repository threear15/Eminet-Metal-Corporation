<?php
include "../connection.php";
session_start();
$f_name = $_POST["f_name1"];
$status = $_POST["status"];
$m_name = $_POST["m_name"];
$l_name = $_POST["l_name"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$m_number = $_POST["m_number"];
$tel_number = $_POST["tel_number"];
$brgy = $_POST["brgy"];
$city = $_POST["city"];
$h_address= $_POST["h_address"];
$g_mail = $_POST["g-mail"];
$password = $_POST["password34"];

$name1 = "/^[A-Z][a-zA-z ]+$/";
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";

if(empty($f_name) || empty($m_name) || empty($l_name) || empty($age) || empty($gender) || empty($m_number) || empty($tel_number) ||
	empty($brgy) || empty($city) || empty($h_address) || empty($g_mail) || empty($password)){
	echo "
			<script>
		        swal({
		          title: 'Warning!!!',
		          text: 'Please Input all the Fields!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>

		";
		exit();
		
}else{
	if(!preg_match($name1,$f_name)){
		echo "
			<script>
		        swal({
		          title: 'Warning!!!',
		          text: '$f_name was Invalid!!!Type Capital Letter First!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
}
if(!preg_match($name1,$l_name)){
		echo "
			<script>
		        swal({
		          title: 'Warning!!!',
		          text: '$l_name was Invalid!!!Type Capital Letter First!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
}
if(!preg_match($name1,$m_name)){
		echo "
			<script>
		        swal({
		          title: 'Warning!!!',
		          text: '$m_name was Invalid!!!Type Capital Letter First!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
}
if(!preg_match($number,$age)){
		echo "
			<script>
		        swal({
		          title: 'Warning!!!',
		          text: '$age was Invalid!!!Type number Only!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
}
if($age <= 20){
		echo "
			<script>
		        swal({
		          title: 'Warning!!!',
		          text: '$age was to young!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
}

if(!preg_match($number,$m_number)){
		echo "
			<script>
		        swal({
		          title: 'Warning!!!',
		          text: '$m_number was Invalid!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
}
if(!strlen($m_number) == 10){
		echo "
			<script>
		        swal({
		          title: 'Warning!!!',
		          text: '$m_number was Invalid!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
}

if(!preg_match($emailValidation,$g_mail)){
		echo "
			<script>
		        swal({
		          title: 'Warning!!!',
		          text: '$g_mail was Invalid!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
}
if(strlen($password) < 9){
		echo "
		<script>
		        swal({
		          title: 'Warning!!!',
		          text: 'Password is Weak!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
	}
	

	$sql = "SELECT id FROM user WHERE gmail = '$g_mail' LIMIT 1";
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
			
	if($count_email > 0){
		echo"
		<script>
		        swal({
		          title: 'Danger!!!',
		          text: '$g_mail was Already in used... Try another G-mail!!!',
		          type: 'error',
		          confirmButtonClass: 'btn-danger',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
	}else{
		$password = md5($password);
		$sql = "INSERT INTO `user` (`id`, `status`, `f_name`, `m_name`, `l_name`, `age`, `gender`, `m_number`, `tel_number`, `brgy`, `city`, `h_address`, `gmail`, `password`) 
		VALUES (NULL, '$status', '$f_name', '$m_name', '$l_name', '$age', '$gender', '$m_number', '$tel_number', '$brgy', '$city', '$h_address', '$g_mail', '$password')";
		$run_query = mysqli_query($con,$sql);
		
			
		if($run_query){	
			
			echo "
			<script>
			setTimeout(function() {
        
        swal({
          title: 'SUCCESS',
          text: 'New Customers Created!',
          type: 'success',
          confirmButtonClass: 'btn-success',
          confirmButtonText: 'Success!'
      },function() {
            window.location = 'customer_modify.php';
        });
     	 }, 1000);
			</script>
		";
		}
		
	}
	}

 ?>
