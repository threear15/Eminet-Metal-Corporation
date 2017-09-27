<?php 
session_start();
include "../connection.php";

if(isset($_POST['get_admin_info'])){
	$uid_admin = $_SESSION['uid_admin'];
	$sql = "SELECT * FROM super_admin WHERE id = '$uid_admin'";
	$run_query = mysqli_query($con,$sql);
	while($row= mysqli_fetch_array($run_query)){
		$uid_name= $row['id'];
		$f_name = $row['f_name'];
		$m_name = $row['m_name'];
		$l_name = $row['l_name'];
		$age = $row['age'];
		$gender = $row['gender'];
		$role = $row['role'];
		echo '
		<div class="col-md-6">
                      <p></p>
			<input type="text" id="f_name23" class="form-control" value="'.$f_name.'" disabled/>
                      <input type="text" id="m_name23" class="form-control" value="'.$m_name.'" disabled/>
                      <input type="text" id="l_name23" class="form-control" value="'.$l_name.'" disabled/>
                      <input type="text" id="age" class="form-control" value="'.$age.'" disabled/>
                      <input type="text" id="gender" class="form-control" value="'.$gender.'" disabled/>
                      <input type="text" id="role" class="form-control" value="'.$role.'" disabled/>
                    </div>
		';
	}
}
if(isset($_POST['get_admin_image'])){
	$uid_admin = $_SESSION['uid_admin'];
	$sql = "SELECT * FROM super_admin WHERE id = '$uid_admin'";
	$run_query = mysqli_query($con,$sql);
	while($row= mysqli_fetch_array($run_query)){
		$uid_name= $row['id'];
		$f_name = $row['f_name'];
		$m_name = $row['m_name'];
		$l_name = $row['l_name'];
		$age = $row['age'];
		$gender = $row['gender'];
		$role = $row['role'];
		if($row['gender'] == 'Male'){
			$admin_image = '<img src="../images/avatar3.png" style="width:250px;height:230px;padding-top:5px;padding-left:5px;">';
		}else{
			$admin_image = '<img src="../images/avatar4.png" style="width:250px;height:230px;padding-top:5px;padding-left:5px;">';
		}
		echo '
				<div class="col-md-3">
                      '.$admin_image.'
                    </div>
		';
	}
}

?>