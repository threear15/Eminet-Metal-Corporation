<?php 
	include "../connection.php";
function edit_view() {
	include "../connection.php";

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
	function message_view() {
	include "../connection.php";

		GLOBAL $con;
		$id_read = $_SESSION['read_id'];
		$open =mysqli_query($con,"SELECT * FROM message WHERE id=".$_SESSION['read_id']);
		while ($row = mysqli_fetch_assoc($open)) {
			$message = $row['message'];
	
			echo "

				<form method='POST'>
				<div class='row'>
				<div class='col-md-12'>
				<textarea class='form-control' placeholder='$message' style='height:500px;'disabled></textarea>
				</div>
				</div>
				<div><br></div>
				<form method='POST'>
					<input type='hidden' name='id' value='".$row['id']."'>
					<input type='hidden' name='status' value='Approved'>
					<button type='submit' class='btn btn-success' name='btn-read'>READ</button>
					
					</form>
				</td>
			";	
		}

		if (isset($_POST['btn-read'])) { 

			$id = $_POST['id'];
			$status = $_POST['status'];

			$query = mysqli_query($con,"UPDATE message SET status='$status' WHERE id ='$id'");
			echo"
                    <script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Read',
            text: '',
            type: 'success'
        }, function() {
            window.location = 'messages.php';
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
			if(empty($password)){
				echo"
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
			}else{
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
	}
function edit_product23(){

		GLOBAL $con;
		$id = $_SESSION['edit_id_product'];
		$open =mysqli_query($con,"SELECT * FROM product WHERE product_id = '$id'");
		while ($row = mysqli_fetch_assoc($open)) {
			echo "
				<div class='row'>
				<form method='POST'>
				<div class='col-md-4'><label>Product Code</label><input type='text' class='form-control' name='product_code' value='".$row['product_code']."' disabled></div>
				<div class='col-md-4'><label>Product Name</label><input type='text' class='form-control' name='product_name' value='".$row['product_name']."'></div>
				<div class='col-md-4'><label>Product Price</label><input type='text' class='form-control' name='product_price' value='".$row['product_price']."'></div>
				</div>
				<div class='row'>
				<div class='col-md-4'><label>Product Style</label><input type='text' class='form-control' name='product_headstyle' value='".$row['product_headstyle']."'></div>
				<div class='col-md-4'><label>Product Color</label><input type='text' class='form-control' name='product_color' value='".$row['product_color']."'></div>
				<div class='col-md-4'><label>Product Size</label><input type='text' class='form-control' name='product_size' value='".$row['product_size']."'></div>
				</div>
				<div class='row'>
				<div class='col-md-4'><label>Product Stocks</label><input type='text' class='form-control' name='product_stocks' value='".$row['product_stocks']."'></div>
				<div class='col-md-4'><label>Product Pieces</label><input type='text' class='form-control' name='product_pieces' value='".$row['product_pieces']."'></div>
				<div class='col-md-4'><label>Date Modified</label><input type='text' class='form-control' name='date1' value='".$row['date1']."'></div>
				</div>
				<div><br></div>
					<div class='row'>
					<div class='col-md-4'></div>
					<div class='col-md-4'>
					<form method='POST'>
					<input type='hidden' name='id' value='".$row['product_id']."'>
						<button type='submit' name='update-product' class='btn btn-success'>Update Product</button>
					</div>
					<div class='col-md-4'></div>
					</div>
				</form>
			";
		}if(isset($_POST['update-product'])){
			$id = $_POST['id'];
			$product_name = $_POST['product_name'];
			$product_price = $_POST['product_price'];
			$product_headstyle = $_POST['product_headstyle'];
			$product_color = $_POST['product_color'];
			$product_size = $_POST['product_size'];
			$product_stocks = $_POST['product_stocks'];
			$product_pieces = $_POST['product_pieces'];
			$date23 = $_POST['date1'];
				$update = "UPDATE product SET product_name ='$product_name',product_price='$product_price',product_headstyle='$product_headstyle',
							product_color ='$product_color',product_size='$product_size',product_stocks='$product_stocks',product_pieces='$product_pieces'
							WHERE product_id='$id'";
				$run_query1 = mysqli_query($con,$update);
				if($run_query1){
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

}
function edit_superadmin() {


		GLOBAL $con;
		$id = $_SESSION['edit_id_admin'];
		$open =mysqli_query($con,"SELECT * FROM super_admin WHERE id =".$_SESSION['edit_id_admin']);
		while ($row = mysqli_fetch_assoc($open)) {

			echo "

				<form method='POST'>
				<div class='row'>
				<div class='col-md-4'><label>First Name</label><input type='text' class='form-control' name='f_name' value='".$row['f_name']."'></div>
				<div class='col-md-4'><label>Middle Name</label><input type='text' class='form-control' name='m_name' value='".$row['m_name']."'></div>
				<div class='col-md-4'><label>Last Name</label><input type='text' class='form-control' name='l_name' value='".$row['l_name']."'></div>
				</div>
				<div class='row'>
				<div class='col-md-4'><label>Role</label><select class='selectpicker form-control' name='role'>
					<option>".$row['role']."</option>
                  <option>Super Admin</option>
                  <option>Admin</option></div></select></div>
				<div class='col-md-4'><label>Gender</label><select class='selectpicker form-control' name='gender'>
					<option>".$row['gender']."</option>
                  <option>Male</option>
                  <option>Female</option></div></select></div>
				<div class='col-md-4'><label>Age</label><input type='text' class='form-control' name='age' value='".$row['age']."'></div>
				</div>
				<div><br></div>
				<div class='row'>
				<div class='col-md-3'></div>
					<div class='col-md-6'>
					<label>Username</label>
						<input type='text' class='form-control' name='user' value='".$row['username']."'>
					</div>
				<div class='col-md-3'></div>
				</div>
				<div><br></div>
				<form method='POST'>

					<input type='text' name='id' value='".$row['id']."'>
					<button type='submit' class='btn btn-success' name='btn-update1' value='update'>UPDATE</button>
					
					</form>
				</td>
			";	
		}

		if (isset($_POST['btn-update1'])) { 

			$id = $_POST['id'];
			$f_name = $_POST['f_name'];
			$m_name = $_POST['m_name'];
			$l_name = $_POST['l_name'];
			$role = $_POST['role'];
			$gender = $_POST['gender'];
			$age = $_POST['age'];
			$user = $_POST['user'];
			


			$query = mysqli_query($con,"UPDATE super_admin SET f_name='$f_name',m_name='$m_name',l_name='$l_name' 
									,role='$role',gender='$gender',age='$age',username='$user' WHERE id ='$id'");
			echo"
                    <script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Updated',
            text: '',
            type: 'success'
        }, function() {
            window.location = 'superadmin_modify.php';
        });
    }, 1);
			</script>
                    ";

		}
		

	}
	function password_superadmin(){
		GLOBAL $con;
		$id = $_SESSION['edit_id_admin'];
		$sql = "SELECT * FROM super_admin WHERE id ='$id'";
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
			if(empty($password)){
				echo"
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
			}else{
				$update = "UPDATE super_admin SET password = '$password2' WHERE id='$id'";
			$run_query = mysqli_query($con,$update);
			echo"
				 <script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Updated',
            text: '',
            type: 'success'
        }, function() {
            window.location = 'superadmin_modify.php';
        });
    }, 1);
			</script>
			";
			}

			
		}
	}
	function edit_admin() {


		GLOBAL $con;
		$id = $_SESSION['edit_id_admin1'];
		$open =mysqli_query($con,"SELECT * FROM super_admin WHERE id =".$_SESSION['edit_id_admin1']);
		while ($row = mysqli_fetch_assoc($open)) {
			echo "

				<form method='POST'>
				<div class='row'>
				<div class='col-md-4'><label>First Name</label><input type='text' class='form-control' name='f_name' value='".$row['f_name']."'></div>
				<div class='col-md-4'><label>Middle Name</label><input type='text' class='form-control' name='m_name' value='".$row['m_name']."'></div>
				<div class='col-md-4'><label>Last Name</label><input type='text' class='form-control' name='l_name' value='".$row['l_name']."'></div>
				</div>
				<div class='row'>
				<div class='col-md-4'><label>Role</label><select class='selectpicker form-control' name='role'>
					<option>".$row['role']."</option>
                  <option>Super Admin</option>
                  <option>Admin</option></div></select></div>
				<div class='col-md-4'><label>Gender</label><select class='selectpicker form-control' name='gender'>
					<option>".$row['gender']."</option>
                  <option>Male</option>
                  <option>Female</option></div></select></div>
				<div class='col-md-4'><label>Age</label><input type='text' class='form-control' name='age' value='".$row['age']."'></div>
				</div>
				<div><br></div>
				<div class='row'>
				<div class='col-md-3'></div>
					<div class='col-md-6'><label>Username</label>
						<input type='text' class='form-control' name='user' value='".$row['username']."'>
					</div>
				<div class='col-md-3'></div>
				</div>
				<div><br></div>
				<form method='POST'>
					<input type='hidden' name='id' value='".$row['id']."'>
					<input type='file' name='image' id='p_image' class='form-control'>
					<button type='submit' class='btn btn-success' name='btn-update1' value='update'>UPDATE</button>
					
					</form>
				</td>
			";	
		}

		if (isset($_POST['btn-update1'])) { 

			$id = $_POST['id'];
			$f_name = $_POST['f_name'];
			$m_name = $_POST['m_name'];
			$l_name = $_POST['l_name'];
			$role = $_POST['role'];
			$gender = $_POST['gender'];
			$age = $_POST['age'];
			$user = $_POST['user'];
			$image = $_POST['image'];
			


			$query = mysqli_query($con,"UPDATE super_admin SET f_name='$f_name',m_name='$m_name',l_name='$l_name' 
									,role='$role',gender='$gender',age='$age',username='$user',image ='$image' WHERE id ='$id'");
			echo"
                    <script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Updated',
            text: '',
            type: 'success'
        }, function() {
            window.location = 'admin_modify.php';
        });
    }, 1);
			</script>
                    ";

		}
		

	}
	function password_admin(){
		GLOBAL $con;
		$id = $_SESSION['edit_id_admin1'];
		$sql = "SELECT * FROM super_admin WHERE id ='$id'";
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
			if(empty($password)){
				echo"
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
			}else{
				$update = "UPDATE super_admin SET password = '$password2' WHERE id='$id'";
			$run_query = mysqli_query($con,$update);
			echo"
				 <script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Updated',
            text: '',
            type: 'success'
        }, function() {
            window.location = 'admin_modify.php';
        });
    }, 1);
			</script>
			";
			}

			
		}
	}
	function edit_view_faq(){
	GLOBAL $con;
	$id = $_SESSION['edit_id'];
	$sql = "SELECT * FROM faq_tbl WHERE id ='$id'";
	$run_query = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($run_query)){
		$id = $row['id'];
		$question = $row['question'];
		echo"
			<form method='POST'>
			<textarea style='width:100%;height:100%;' name='textarea'>
			$question
			</textarea>
			<form method='POST'>
			<input type='hidden' name='id' value='".$row['id']."'>
			<input type='submit' class='btn btn-success' name='btn-update' value='UPDATE'>
			</form>
		";
	}if(isset($_POST['btn-update'])){
		$id = $_POST['id'];
		$question = $_POST['textarea'];
		$sql = "UPDATE faq_tbl SET question ='$question' WHERE id = '$id'";
		$run_query = mysqli_query($con,$sql);
		if($run_query){
			echo"

			<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Updated',
            text: '',
            type: 'success'
        }, function() {
            window.location = 'edit_faq.php';
        });
    }, 1);
			</script>
			";
		}
	}
}
?>