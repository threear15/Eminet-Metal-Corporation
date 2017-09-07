<?php 
include "connection.php";
include 'PHPMailerAutoload.php';
session_start();
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";

if(isset($_POST["userforgot"])){
	$gmailforgot = mysqli_real_escape_string($con,$_POST['gmailforgot']);


	$sql = "SELECT * FROM user WHERE gmail = '$gmailforgot'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);

if(empty($gmailforgot)){
			echo"
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
			if(!preg_match($emailValidation, $gmailforgot)){
					echo "
			<script>
		        swal({
		          title: 'FAILED!!!',
		          text: 'Invalid Gmail-Address!!!',
		          type: 'error',
		          confirmButtonClass: 'btn-danger',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
			}
		
			if($count == 1){
				$row = mysqli_fetch_array($run_query);
				$_SESSION['uid2'] = $row['id'];
				$_SESSION['code'] = $row['password'];
				$_SESSION['number'] = $row["m_number"];
				
				$_SESSION['number2']=  str_pad(substr($_SESSION['number'], -3), strlen($_SESSION['number']), '*', STR_PAD_LEFT);
		echo "
<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successful',
            text: '',
            type: 'success'
        }, function() {
            window.location = 'code.php';
        });
    }, 1000);
			</script>
			
			";


	}
	if($count == 0){
			echo "
			<script>
		        swal({
		          title: 'Password Recovery... FAILED!!!',
		          text: 'Please Message us to fix this!!!',
		          type: 'error',
		          confirmButtonClass: 'btn-danger',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
	}
		
		

	}
}


if(isset($_POST['usertrue'])){

	$as_number = mysqli_real_escape_string($con,$_POST['as_number']);
	$true_number = mysqli_real_escape_string($con,$_POST['true_number']);
	$true_gmail = mysqli_real_escape_string($con,$_POST['true_gmail']);
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
			$mailer->Body =  'Hello '.$true_gmail.'<a href="#">Click here...recovery pass</a> '.$_SESSION['code'];
			$mailer->Subject = 'Emient';
			$mailer->AddAddress($true_gmail);
$sql = "SELECT * FROM user WHERE gmail = '$true_gmail' AND m_number ='$true_number'";
$run_query = mysqli_query($con,$sql);
$count = mysqli_num_rows($run_query);

if(empty($true_number) || empty($true_gmail)){
	echo"
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
	
	if(!preg_match($number, $true_number)){
	echo"
				<script>
		        swal({
		          title: 'Warning!!!',
		          text: 'You need to type number',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
			";
	exit();
}if(strlen($true_number) != 10){
		echo "
			<script>
		        swal({
		          title: 'Warning!!!',
		          text: 'Number must be 10 digits!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
}
	else{
		if(!$mailer->send()) {
			echo "
			<script>
		        swal({
		          title: 'Recovery Failed!!',
		          text: 'Please Check your connection!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
			}
	if($count == 0){
	echo "
			<script>
		        swal({
		          title: 'Password Recovery... FAILED!!!',
		          text: 'Please Message us to fix this!!!',
		          type: 'error',
		          confirmButtonClass: 'btn-danger',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
}
if($count == 1){
	echo "
		<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successful',
            text: 'Go your Gmail-Account and Copy the code',
            type: 'success'
        }, function() {
            window.location = 'verify.php';
        });
    }, 1000);
			</script>
			
			";

}

}
}

}
include "connection.php";
if(isset($_POST["update"])){
	$code = mysqli_real_escape_string($con,$_POST['code']);
	$new_pass = mysqli_real_escape_string($con,$_POST['new_pass']);

	$sql = "SELECT * FROM user WHERE password = '$code'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if(empty($code) || empty($new_pass)){
		echo"
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
		if($count == 0){
			echo "
			<script>
		        swal({
		          title: 'Password Recovery... FAILED!!!',
		          text: 'Please Message us to fix thisssssssss!!!',
		          type: 'error',
		          confirmButtonClass: 'btn-danger',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
		}
	
	if($count == true){
		$new_pass = md5($new_pass);
		$uid = $_SESSION['uid2'];
		$sql1 = "UPDATE user SET password = '$new_pass'";
		$run_query1 = mysqli_query($con,$sql1);
		if($run_query1){
			echo "
		<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Done',
            text: 'Your Password Has Been Reset',
            type: 'success'
        }, function() {
            window.location = 'logout2.php';
        });
    }, 1000);
			</script>
			
			";
		}
		
		
	}
	}

}
?>