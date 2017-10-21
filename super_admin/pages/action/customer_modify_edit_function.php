<?php 
include "connection/connection.php";

function edit_view_customer(){
	GLOBAL $con;
	$id = $_SESSION['edit_id'];
	$sql = "SELECT * FROM user WHERE id='$id'";
	$run_query = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($run_query)){
		$id = $row['id'];
		$status = $row['status'];
		$f_name = $row['f_name'];
		$m_name = $row['m_name'];
		$l_name = $row['l_name'];
		$age = $row['age'];
		$gender = $row['gender'];
		$m_number = $row['m_number'];
		$tel_number = $row['tel_number'];
		$brgy = $row['brgy'];
		$city = $row['city'];
		$h_address = $row['h_address'];
		$gmail = $row['gmail'];

		echo'
			<form method="POST">
			<div class="row">
                      
                      <div class="col-md-2"><label style="padding-top:10px;">First Name</div>
                      <div class="col-md-4"><input type="text"  class="form-control" value="'.$f_name.'" name="f_name"></div>
                      <div class="col-md-2"><label >Middle Name</div>
                      <div class="col-md-4"><input type="text"  class="form-control" value="'.$m_name.'" name="m_name"></div>
                      
            </div><br>

            <div class="row">
                      
                      <div class="col-md-2"><label style="padding-top:10px;">Last Name</div>
                      <div class="col-md-4"><input type="text"  class="form-control" value="'.$l_name.'" name="l_name"></div>
                      <div class="col-md-2"><label style="padding-top:10px;">Age</div>
                      <div class="col-md-4"><input type="text"  class="form-control" value="'.$age.'" name="age"></div>
                      
            </div><br>

            <div class="row">
                      
                      <div class="col-md-2"><label style="padding-top:10px;">Gender</div>
                      <div class="col-md-4">
                      <select id="heard" class="form-control" name="gender">
                      		<option>'.$gender.'</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                      </div>
                      <div class="col-md-2"><label >Phone Number</div>
                      <div class="col-md-4"><input type="text"  class="form-control" value="'.$m_number.'" name="m_number"></div>
                      
            </div><br>

            <div class="row">
                      
                      <div class="col-md-2"><label style="padding-top:10px;">Tel Number</div>
                      <div class="col-md-4"><input type="text"  class="form-control" value="'.$tel_number.'" name="tel_number"></div>
                      <div class="col-md-2"><label style="padding-top:10px;">Barangay</div>
                      <div class="col-md-4"><input type="text"  class="form-control" value="'.$brgy.'" name="brgy"></div>
                      
            </div><br>

            <div class="row">
                      
                      <div class="col-md-2"><label style="padding-top:10px;">City</div>
                      <div class="col-md-4"><input type="text"  class="form-control" value="'.$city.'" name="city"></div>
                      <div class="col-md-2"><label>Home Address</div>
                      <div class="col-md-4"><input type="text"  class="form-control" value="'.$h_address.'" name="h_address"></div>
                      
            </div><br>

            <div class="row">
                      
                      <div class="col-md-2"><label style="padding-top:10px;">G-mail</div>
                      <div class="col-md-4"><input type="text"  class="form-control" value="'.$gmail.'" name="gmail"></div>
                      <div class="col-md-2"><label style="padding-top:10px;">Status</div>
                      <div class="col-md-4">
                      <select id="heard" class="form-control" name="status">
                      		<option>'.$status.'</option>
                            <option value="Approved">Approved</option>
                            <option value="Pending">Pending</option>
                          </select>
                      </div>
                      
            </div><br>
            <input type="hidden" name="id" value="'.$id.'">
            <center><button class="btn btn-success" name="btn-update">Update</button></center>
                      
			</form>
		';

	}if(isset($_POST['btn-update'])){
		$id = $_POST['id'];
		$status = $_POST['status'];
		$f_name = $_POST['f_name'];
		$m_name = $_POST['m_name'];
		$l_name = $_POST['l_name'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$m_number = $_POST['m_number'];
		$tel_number = $_POST['tel_number'];
		$brgy = $_POST['brgy'];
		$city = $_POST['city'];
		$h_address = $_POST['h_address'];
		$gmail = $_POST['gmail'];

		$sql = "UPDATE user SET f_name = '$f_name', m_name = '$m_name', l_name = '$l_name'
				, age = '$age', gender = '$gender', m_number = '$m_number', tel_number = '$tel_number'
				, brgy = '$brgy', city = '$city', h_address = '$h_address', gmail = '$gmail', status ='$status'
					WHERE id = '$id'";
		$run_query = mysqli_query($con,$sql);
		if($run_query){
			echo"
			<script>
			setTimeout(function() {
        
        swal({
          title: '',
          text: 'Successfully updated',
          type: 'success',
          confirmButtonClass: 'btn-success',
          confirmButtonText: 'Success!'
      },function() {
            window.location = 'customer_modify.php';
        });
     	 }, 1);
			</script>
			";
		}
	}
}
 ?>