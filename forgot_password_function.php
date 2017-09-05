<?php 
include "connection.php";
session_start();
$gmailforgot = $_POST['gmailforgot'];
$u_question = $_POST['u_question'];
$u_answer = $_POST['u_answer'];
if(isset($_POST["userforgot"])){
	$gmailforgot = mysqli_real_escape_string($con,$_POST['gmailforgot']);
	$u_question = mysqli_real_escape_String($con,$_POST['u_question']);
	$u_answer = mysqli_real_escape_string($con,$_POST['u_answer']);

	$sql = "SELECT * FROM user WHERE gmail = '$gmailforgot' AND unique_question = '$u_question' AND unique_answer = '$u_answer'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	
if(empty($gmailforgot) || empty($u_question) || empty($u_answer)){
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
		
			if($count == 1){
				$row = mysqli_fetch_array($run_query);
				$_SESSION['uid2'] = $row['id'];
				$_SESSION['code'] = $row['password'];
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

?>