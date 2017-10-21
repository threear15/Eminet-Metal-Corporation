<?php
include "connection.php";
session_start();

if(isset($_POST['userlogin'])){
	$gmail = mysqli_real_escape_string($con,$_POST['usergmail']);
	$password12 = mysqli_real_escape_string($con,$_POST['userpass12']);
	$status = mysqli_real_escape_string($con,$_POST['status']);
	
	$sql = "SELECT * FROM user WHERE gmail = '$gmail' AND status = '$status'";
	$run_query = mysqli_query($con,$sql);
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
	$row = mysqli_fetch_array($run_query);
		$_SESSION['uid'] = $row['id'];
		$_SESSION['name'] = $row['f_name'];
		$_SESSION['m_name'] = $row['m_name'];
		$_SESSION['l_name'] = $row['l_name'];
		$_SESSION['gmail'] = $row['gmail'];
		$_SESSION['number'] = $row['m_number'];
		$_SESSION['tel_number'] = $row['tel_number'];
		$_SESSION['brgy'] = $row['brgy'];
		$_SESSION['city'] = $row['city'];
		$_SESSION['h_address'] = $row['h_address'];


		if(password_verify($password12, $row['password'])){
			echo "
			<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Login',
            text: '',
            type: 'success',
        }, function() {
            window.location = 'userpage/profile.php';
        });
    }, 1000);
			</script>
			
			";
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
	


	}
if(isset($_POST['addproduct'])){
	$p_id = $_POST['proid'];
	$sql = "SELECT * FROM product WHERE product_id ='$p_id'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count >0){
		echo "
	<script>
		        swal({
		          title: 'Warning!!!',
		          text: 'You Need To Sign First!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Okay'

		        });
			</script>
	";

	} 
	
}
if(isset($_POST['delete_receipt'])){
	$uid = $_SESSION['uid'];
	$sql = "DELETE  FROM cart_approved WHERE user_id='$uid'";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
		echo"
			<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Deleted',
            text: '',
            type: 'success'
        }, function() {
            window.location = 'profile.php';
        });
    }, 1000);
			</script>
		";
	}
}
if(isset($_POST['print_receipt'])){
	$uid = $_SESSION['uid'];
	$sql = "SELECT *  FROM cart_approved WHERE user_id='$uid'";
	$run_query = mysqli_query($con,$sql);
	$count= mysqli_num_rows($run_query);
	if($count > 0){
			echo"
			<script>
	
            window.location = 'print_item.php';
    
			</script>
		";
	}else{
		echo"
		<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Warning',
            text: 'No Item To be Print',
            type: 'warning'
        }, function() {
            window.location = 'profile.php';
        });
    }, 1);
			</script>
		";
	
	}
	
}

if(isset($_POST['login_admin'])){
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$role = mysqli_real_escape_string($con,$_POST['role']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$sql = "SELECT * FROM super_admin WHERE username ='$username' AND role ='$role'";
	$run_query = mysqli_query($con,$sql);
	if(empty($username) || empty($password)){
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
		
			$row = mysqli_fetch_array($run_query);

			$_SESSION['uid_admin'] = $row['id'];
			$_SESSION['name_admin'] = $row['f_name'];
			if(password_verify($password, $row['password'])){
				echo"
			<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Login',
            text: '',
            type: 'success'
        }, function() {
            window.location = 'index.php';
        });
    }, 1);
			</script>
		";
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

	}
	}
	
}
if(isset($_POST['login_admin1'])){
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$role = mysqli_real_escape_string($con,$_POST['role']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$sql = "SELECT * FROM super_admin WHERE username ='$username' AND role ='$role'";
	$run_query = mysqli_query($con,$sql);
	if(empty($username) || empty($password)){
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
		
			$row = mysqli_fetch_array($run_query);

			$_SESSION['uid_admin1'] = $row['id'];
			$_SESSION['name_admin1'] = $row['f_name'];
			
		if(password_verify($password, $row['password'])){
				echo"
			<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Login',
            text: '',
            type: 'success'
        }, function() {
            window.location = 'index.php';
        });
    }, 1);
			</script>
		";	
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

	}
	}
	
}
?>