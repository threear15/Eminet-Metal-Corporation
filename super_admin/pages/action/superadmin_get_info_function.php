<?php 	
include "connection/connection.php";

function get_admin_info(){
	GLOBAL $con;
	$id = $_SESSION['admin_id'];
	$sql = "SELECT * FROM super_admin WHERE id ='$id'";
	$run_query = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($run_query)){
		$id = $row['id'];
		$f_name = $row['f_name'];
		$l_name = $row['l_name'];
		$m_name = $row['m_name'];
		$gender = $row['gender'];
		$age = $row['age'];
		$username = $row['username'];
		$password = $row['password'];
		echo'
				<form method="POST">
                      <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-2"><label style="padding-top:10px;">First Name</div>
                      <div class="col-md-5"><input type="text"  class="form-control" value="'.$f_name.'" name="f_name"></div>
                      <div class="col-md-2"></div>
                      </div><br>
                      <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-2"><label style="padding-top:10px;">Middle Name</div>
                      <div class="col-md-5"><input type="text"  class="form-control" value="'.$m_name.'" name="m_name"></div>
                      <div class="col-md-2"></div>
                      </div><br>
                      <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-2"><label style="padding-top:10px;">Last Name</div>
                      <div class="col-md-5"><input type="text"  class="form-control" value="'.$l_name.'" name="l_name"></div>
                      <div class="col-md-2"></div>
                      </div><br>
                      <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-2"><label style="padding-top:10px;">Age</div>
                      <div class="col-md-5"><input type="text"  class="form-control" value="'.$age.'" name="age"></div>
                      <div class="col-md-2"></div>
                      </div><br>
                      <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-2"><label style="padding-top:10px;">Gender</div>
                      <div class="col-md-5"><select id="heard" class="form-control" name="gender" required>
                            <option>'.$gender.'</option>
                            <option  value="Male">Male</option>
                            <option  value="Female">Female</option>
                          </select></div>
                      <div class="col-md-2"></div>
                      </div><br>
                      <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-2"><label style="padding-top:10px;">Username</div>
                      <div class="col-md-5"><input type="text"  class="form-control" value="'.$username.'" name="username"></div>
                      <div class="col-md-2"></div>
                      </div><br>
                      <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-2"><label style="padding-top:10px;">Password</div>
                      <div class="col-md-5"><input type="text"  class="form-control" value="'.$password.'" name="password" disabled></div>
                      <div class="col-md-2"></div>
                      </div>
                      <div>
                      <div class="row" style="padding-top:4px;">
                      <center><div><button class="btn btn-success" name="btn-update">Update</button>
                      				<button class="btn btn-success" name="btn-username">Update Username</button></div>
                      </div>
                    </form>
		';
	}if(isset($_POST['btn-update'])){
		$f_name = $_POST['f_name'];
		$l_name = $_POST['l_name'];
		$m_name = $_POST['m_name'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$username = $_POST['username'];

		$sql = "UPDATE super_admin SET f_name = '$f_name', m_name = '$m_name',
				l_name = '$l_name', age = '$age', gender = '$gender', username = '$username' WHERE id=".$_SESSION['admin_id'];
		$run_query = mysqli_query($con,$sql);
			if($run_query){
			echo "<script>
			
        
        setTimeout(function() {
        swal({
            title: 'SUCCESS',
            text: 'Acoount Updated',
            type: 'success',
        }, function() {
            window.location = 'index.php';
        });
    }, 1);
			</script";
		}

		}if(isset($_POST['btn-username'])){
		$username = $_POST['username'];

		 $sql = "SELECT * FROM super_admin WHERE username = '$username' LIMIT 1";
			$run_query = mysqli_query($con,$sql);
			$count = mysqli_num_rows($run_query);
			if($count >= 1){
				echo"
						<script>
					        swal({
					          title: '',
					          text: 'Username was already in used!!! Try another!!!',
					          type: 'warning',
					          confirmButtonClass: 'btn-warning',
					          confirmButtonText: 'Ok'
					        });
						</script>
				";exit();
			}else{

		$sql = "UPDATE super_admin SET username = '$username' WHERE id=".$_SESSION['admin_id'];
		$run_query = mysqli_query($con,$sql);
			if($run_query){
			echo "<script>
			
        
        setTimeout(function() {
        swal({
            title: 'SUCCESS',
            text: 'Username Updated',
            type: 'success',
        }, function() {
            window.location = 'index.php';
        });
    }, 1);
			</script>";
				$password_verify = $_SESSION['password'];

	$sql = "SELECT * FROM super_admin WHERE password = '$password_verify' AND id =".$_SESSION['admin_id'];
	$run_query = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($run_query)){
		$id = $row['id'];
			$role = $row['role'];
			$_SESSION['admin_id'] = $row['id'];
			$_SESSION['f_name'] = $row['f_name'];
			$_SESSION['m_name'] = $row['m_name'];
			$_SESSION['l_name'] = $row['l_name'];
			$_SESSION['image'] = $row['image'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
	if(password_verify($password_verify, $row['password'])){
		echo "<script>
			
        
        setTimeout(function() {
        swal({
            title: 'SUCCESS',
            text: 'Username Updated',
            type: 'success',
        }, function() {
            window.location = 'index.php';
        });
    }, 1);
			</script>";
	}
	}
		}

		}	
	}
		
		
		
	
}

 ?>
