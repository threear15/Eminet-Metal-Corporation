<?php
include "../connection/connection.php"; 
session_start();

if(isset($_POST['login'])){
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);


	$sql = "SELECT * FROM super_admin WHERE username ='$username'";
	$run_query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($run_query);
			$id = $row['id'];
			$role = $row['role'];
			$_SESSION['admin_id'] = $row['id'];
			$_SESSION['f_name'] = $row['f_name'];
			$_SESSION['m_name'] = $row['m_name'];
			$_SESSION['l_name'] = $row['l_name'];
			
			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
			if($row['image'] == 'empty' AND $row['gender'] == 'Male'){
				$_SESSION['image'] = "images/avatar3.png";
			}elseif($row['image'] == 'empty' AND $row['gender'] == 'Female'){
				$_SESSION['image'] = "images/avatar4.png";
			}else{
				$_SESSION['image'] = $row['image'];
			}
	if(password_verify($password, $row['password']) && $role = 'Super Admin'){
		
		echo "
			<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Login',
            text: '',
            type: 'success',
        }, function() {
            window.location = '../pages/index.php';
        });
    }, 1000);
			</script>
		";
		exit();
	}else{
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

?>