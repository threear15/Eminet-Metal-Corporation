<?php 
	include "../connection.php";
function edit_view() {


		GLOBAL $con;
		$id = $_SESSION['edit_id'];
		$open =mysqli_query($con,"SELECT * FROM user WHERE id = '$id'");
		while ($row = mysqli_fetch_assoc($open)) {

			echo "

				<form method='POST'>
				<div class='row'>
				<div class='col-md-4'><label>First Name</label><input type='text' class='form-control' name='f_name' value='".$row['f_name']."'></div>
				<div class='col-md-4'><label>Middle Name</label><input type='text' class='form-control' name='m_name' value='".$row['m_name']."'></div>
				<div class='col-md-4'><label>Last Name</label><input type='text' class='form-control' name='l_name' value='".$row['l_name']."'></div>
				</div>
				<div class='row'>
				<div class='col-md-4'><label>G-mail Address</label><input type='text' class='form-control' name='gmail' value='".$row['gmail']."'></div>
				<div class='col-md-4'><label>Gender</label><select class='selectpicker form-control' name='gender'>
					<option>".$row['gender']."</option>
                  <option>Male</option>
                  <option>Female</option></div></select></div>
				<div class='col-md-4'><label>Age</label><input type='text' class='form-control' name='age' value='".$row['age']."'></div>
				</div>
				<div class='row'>
				<div class='col-md-4'><label>Mobile Number</label><input type='text' class='form-control' name='m_number' value='".$row['m_number']."'></div>
				<div class='col-md-4'><label>Telephone Number</label><input type='text' class='form-control' name='tel_number' value='".$row['tel_number']."'></div>
				<div class='col-md-4'><label>City</label><input type='text' class='form-control' name='city' value='".$row['city']."'></div>
				</div>
				<div class='row'>
				<div class='col-md-4'><label>Barangay</label><input type='text' class='form-control' name='brgy' value='".$row['brgy']."'></div>
				<div class='col-md-4'><label>Home Address</label><input type='text' class='form-control' name='h_address' value='".$row['h_address']."'></div>
				<div class='col-md-4'><label>Status</label><select class='selectpicker form-control' name='status'>
					<option><b>".$row['status']."<b></option>
                  <option>Approved</option>
                  <option>Pending</option></div></select></div>
				</div>
				<div><br></div>
				<form method='POST'>
					<input type='hidden' name='id' value='".$row['id']."'>
					<button type='submit' class='btn btn-success' name='btn-update' value='update'>UPDATE</button>
					
					</form>
				</td>
			";	
		}

		if (isset($_POST['btn-update'])) { 

			$id = $_POST['id'];
			$f_name = $_POST['f_name'];
			$m_name = $_POST['m_name'];
			$l_name = $_POST['l_name'];
			$gmail = $_POST['gmail'];
			$gender = $_POST['gender'];
			$age = $_POST['age'];
			$m_number = $_POST['m_number'];
			$tel_number = $_POST['tel_number'];
			$city = $_POST['city'];
			$brgy = $_POST['brgy'];
			$h_address = $_POST['h_address'];
			$status = $_POST['status'];


			$query = mysqli_query($con,"UPDATE user SET f_name='$f_name',m_name='$m_name',l_name='$l_name' 
									,gmail='$gmail',gender='$gender',age='$age'
									,m_number='$m_number',tel_number='$tel_number',city='$city'
									,brgy='$brgy',h_address='$h_address', status='$status' WHERE id ='$id'");
			echo"
                    <script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Login',
            text: '',
            type: 'success'
        }, function() {
            window.location = 'customer_modify.php';
        });
    }, 1);
			</script>
                    ";

		}
		

	}
	function password_customer(){
		GLOBAL $con;
		$id = $_SESSION['edit_id'];
		$sql = "SELECT * FROM user WHERE id ='$id'";
		$run_query = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($run_query)){

			echo "

				<form method='POST'>
				<div class='row'>
				<div class='col-md-12'><label>Current Password(Converted to md5)</label><input type='text' class='form-control'  value='".$row['password']."' disabled></div>
				<div class='col-md-12'><label>Type New Password</label><input type='text' class='form-control' name='password' value=''></div>

				</div>
				<div><br></div>
				<form method='POST'>
					<input type='hidden' name='id' value='".$row['id']."'>
					<button type='submit' class='btn btn-success' name='btn-update' value='update'>UPDATE</button>
					</form>
				</td>
			";	
		}
		if(isset($_POST['btn-update'])){
			$id = $_POST['id'];
			$password = $_POST['password'];
			$password2 = md5($password);

			$update = "UPDATE user SET password = '$password2' WHERE id='$id'";
			$run_query = mysqli_query($con,$update);
			echo"
				 <script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Updated',
            text: '',
            type: 'success'
        }, function() {
            window.location = 'customer_modify.php';
        });
    }, 1);
			</script>
			";
		}
	}
?>