<?php 
include "connection/connection.php";
function edit_view_admin(){
	GLOBAL $con;
	$id = $_SESSION['edit_id'];
	$sql = "SELECT * FROM super_admin WHERE id ='$id'";
	$run_query = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($run_query)){
		$id = $row['id'];
		$role = $row['role'];
		$f_name = $row['f_name'];
		$m_name = $row['m_name'];
		$l_name = $row['l_name'];
		$age = $row['age'];
		$gender = $row['gender'];
		$username = $row['username'];
		echo'
					<form method="POST" class="form-horizontal form-label-left input_mask">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="f_name" name="f_name" placeholder="First Name" value="'.$f_name.'">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess3" placeholder="Last Name" name="l_name" value="'.$l_name.'">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="m_name" name="m_name" placeholder="Middle Name" value="'.$m_name.'">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess3" placeholder="Age" name="age" value="'.$age.'">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <select id="heard" class="form-control" style="padding-left:50px;" name="gender">
                      		<option>'.$gender.'</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <select id="heard" class="form-control" name="role">
                      		<option>'.$role.'</option>
                            <option value="Admin">Admin</option>
                            <option value="Super Admin">Super Admin</option>
                          </select>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="User Name" name="username" value="'.$username.'">
                        <span class="fa fa-user-md form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="password" class="form-control" id="inputSuccess5" placeholder="Password" name="password" value="*******************************"disabled>
                        <span class="fa fa-eye-slash form-control-feedback right" aria-hidden="true"></span>

                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      		<input type="hidden" name="id" value="'.$id.'">  
                          <center><button type="submit" class="btn btn-success" name="btn-update">Update</button></center>
                      </div>

                    </form>
		';
	}if(isset($_POST['btn-update'])){
		$id = $_POST['id'];
		$role = $_POST['role'];
		$f_name = $_POST['f_name'];
		$m_name = $_POST['m_name'];
		$l_name = $_POST['l_name'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$username = $_POST['username'];
		
		$sql = "UPDATE super_admin SET f_name = '$f_name', m_name = '$m_name', l_name = '$l_name'
				, age = '$age', gender = '$gender', role = '$role', username = '$username' WHERE id =".$_SESSION['edit_id'];
		$run_query = mysqli_query($con,$sql);
		if($run_query){
			echo "
			<script>
			setTimeout(function() {
        
        swal({
          title: 'Successfully Registered',
          text: 'Go to your!',
          type: 'success',
          confirmButtonClass: 'btn-success',
          confirmButtonText: 'Success!'
      },function() {
            window.location = 'admin_modify.php';
        });
     	 }, 1);
			</script>
		";
		}
	}
}
 ?>
 