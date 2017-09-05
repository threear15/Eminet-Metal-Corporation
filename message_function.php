<?php 
include "connection.php";

$gmail1 = $_POST['gmail1'];
$name = $_POST['name'];
$message = $_POST['message'];
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
if(empty($gmail1) || empty($name) || empty($message)){
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
	if(!preg_match($emailValidation,$gmail1)){
		echo "
			<script>
		        swal({
		          title: 'Warning!!!',
		          text: '$gmail1 was Invalid!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
	}
}
$sql = "SELECT id FROM message WHERE gmail = '$gmail1' LIMIT 1";
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo"
		<script>
		        swal({
		          title: 'Danger!!!',
		          text: '$gmail1 was Already in used... Try another G-mail!!!',
		          type: 'error',
		          confirmButtonClass: 'btn-danger',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
	}

$sql = "SELECT id FROM message WHERE message = '$message' LIMIT 1";
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo"
		<script>
		        swal({
		          title: 'Danger!!!',
		          text: '$message was Already Sent... Write another message!!!',
		          type: 'error',
		          confirmButtonClass: 'btn-danger',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";
		exit();
	}

else{

	$sql = "INSERT INTO `message` (`id`, `name`, `gmail`, `message`, `date`) 
	VALUES (NULL, '$name', '$gmail1', '$message', CURRENT_TIMESTAMP)";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
		echo "
		<script>
			
        
        swal({
          title: 'Successfully Send',
          text: 'Thanks for your Concern!',
          type: 'success',
          confirmButtonClass: 'btn-success',
          confirmButtonText: 'Ok!',
        });
     	
			</script>
			<script>header('REFRESH:3;URL=profile.php');</script>
		";
	}

}
?>