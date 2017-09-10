<?php
include "connection.php";
session_start();

if(isset($_POST['userlogin'])){
	$gmail = mysqli_real_escape_string($con,$_POST['usergmail']);
	$password12 = md5($_POST['userpass12']);
	$status = mysqli_real_escape_string($con,$_POST['status']);
	
	$sql = "SELECT * FROM user WHERE gmail = '$gmail' and password = '$password12' and status = '$status'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$gmail = $_POST['usergmail'];
$password12 = $_POST['userpass12'];
	if(empty($gmail) || empty($password12)){
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
	}
	else{

if($count == 1){
		$row = mysqli_fetch_array($run_query);
		$_SESSION['uid'] = $row['id'];
		$_SESSION['name'] = $row['f_name'];

		echo "
			<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Login',
            text: '',
            type: 'success'
        }, function() {
            window.location = 'userpage/profile.php';
        });
    }, 1000);
			</script>
			
			";
			
		}
			if($count == 0){
			echo "
			<script>
		        swal({
		          title: 'LOGIN FAILED',
		          text: 'Please Try Again!!!',
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