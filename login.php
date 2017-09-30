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
		$_SESSION['gmail'] = $row['gmail'];
		$_SESSION['number'] = $row['m_number'];

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
	$password = md5($_POST['password']); 
	$sql = "SELECT * FROM super_admin WHERE username ='$username' AND password ='$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
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
			if($count > 0){
			$_SESSION['uid_admin'] = $row['id'];
			$_SESSION['name_admin'] = $row['f_name'];
			
				
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