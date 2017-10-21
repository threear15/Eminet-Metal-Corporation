<?php 
include "connection/connection.php";

function view_password_customer(){
	GLOBAL $con;
	$id = $_SESSION['customer_password'];
	$sql = "SELECT * FROM user WHERE id ='$id'";
	$run_query = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($run_query)){
		$id = $row['id'];
		$password = $row['password'];
		echo"
		<h4 class='modal-title'>Admin's Change Password</h4>
        </div>
        <div style='padding-top:10px;font-weight:bold;padding-left:20px;'>".$row['f_name']." ".$row['m_name']." ".$row['l_name']."</div>
        <div class='modal-body'>
          <div class='x_content'>
		<form method='POST'>
			<div class='row'>
				<div class='col-md-12'>
					<input type='text' class='form-control' value='$password' disabled>
				</div>
			</div><br>
			<div class='row'>
				<div class='col-md-12'>
					<input type='text' class='form-control' name='password' placeholder='Type new password here...'>
				</div>
			</div><br>
			<center>
			
			<input type='hidden' name='id' value='$id'>
			<button class='btn btn-success' name='btn-update'>Update</button>
			</center>
			</form>
		";
	}if(isset($_POST['btn-update'])){
		$id = $_POST['id'];
		$password = $_POST['password'];
		$hash = $password;
		$password_hash = password_hash($hash, PASSWORD_DEFAULT);

		if(empty($password)){
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
		}else{
		$sql = "UPDATE user SET password = '$password_hash' WHERE id='$id'";
		$run_query = mysqli_query($con,$sql);
		if($run_query){
			echo "
			<script>
			
        
        setTimeout(function() {
        swal({
            title: '',
            text: 'Password has been changed!!!',
            type: 'success',
        }, function() {
            window.location = 'customer_modify.php';
        });
    		}, 1);
			</script>
		";
		exit();
		}
		}

		
	}
}
 ?>