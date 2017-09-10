<?php
include "connection.php";
include 'PHPMailerAutoload.php';
session_start();
$f_name = $_POST["f_name1"];
$pending = $_POST["pending"];
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

$mailer = new PHPMailer();
			$mailer->IsSMTP();
			$mailer->Host = 'smtp.gmail.com:465'; 
			$mailer->SMTPAuth = TRUE;
			$mailer->Port = 465;
			$mailer->mailer="smtp";
			$mailer->SMTPSecure = 'ssl'; 
			$mailer->IsHTML(true);
			$mailer->SMTPOptions = array('ssl' => array(
									'verify_peer' => false, 
									'verify_peer_name' => false, 
									'allow_self_signed' => true)
									);
			$mailer->Username = 'sempronthreear@gmail.com';
			$mailer->Password = '981872946035860x';
			$mailer->From = 'admin@noreply.com'; 
			$mailer->FromName = 'Eminent';
			$mailer->Body =  'Hello '.$f_name.'<a href="http://localhost/emcfinal/gmail_activate.php">Click Me to Activate Your Account</a> EMC'.rand(11111,999999);
			$mailer->Subject = 'Emient';
			$mailer->AddAddress($g_mail);
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
		<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Password is weak!!!</b>
			</div>
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
		if(!$mailer->send()) {
			echo "
			<script>
		        swal({
		          title: 'Registration Failed!!',
		          text: 'Please Check your connection!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
			} 
		$password = md5($password);
		$gmail_session = $g_mail;
		$pending_account = $pending;
		$sql = "INSERT INTO `user` (`id`, `status`, `f_name`, `m_name`, `l_name`, `age`, `gender`, `m_number`, `tel_number`, `brgy`, `city`, `h_address`, `gmail`, `password`) 
		VALUES (NULL, '$pending', '$f_name', '$m_name', '$l_name', '$age', '$gender', '$m_number', '$tel_number', '$brgy', '$city', '$h_address', '$g_mail', '$password')";
		$run_query = mysqli_query($con,$sql);
		
			
		if($run_query){
			$_SESSION['gmail'] = $gmail_session;
			$_SESSION['approved'] = $pending_account;
			
			
			echo "
			<script>
			setTimeout(function() {
        
        swal({
          title: 'Successfully Registered',
          text: 'Go to your!',
          type: 'success',
          confirmButtonClass: 'btn-success',
          confirmButtonText: 'Success!'
      },function() {
            window.location = 'user_reg.php';
        });
     	 }, 1000);
			</script>
		";
		}
		
	}
	}

 ?>
