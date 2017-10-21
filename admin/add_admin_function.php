<?php 
	include "../connection.php";
function add_admin(){
GLOBAL $con;
		
		if(isset($_POST['btn_add_admin'])){
			$f_name 	= mysqli_real_escape_string($con, $_POST['f_name']);
			$m_name		= mysqli_real_escape_string($con, $_POST['m_name']);
			$l_name	= mysqli_real_escape_string($con, $_POST['l_name']);
			$age	= mysqli_real_escape_string($con, $_POST['age']);
			$gender	= mysqli_real_escape_string($con, $_POST['gender']);
			$role		= mysqli_real_escape_string($con, $_POST['role']);
			$user	= mysqli_real_escape_string($con, $_POST['user']);
			$pass		= mysqli_real_escape_string($con, $_POST['pass']);
			$pass2 = md5($pass);
			
			if(empty($f_name) || empty($m_name) || empty($l_name) ||
				empty($age) || empty($gender) || empty($role) || empty($user) || empty($pass)){
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
				$save_info = "INSERT INTO `super_admin` (`id`, `f_name`, `m_name`, `l_name`, `username`, `password`, `age`, `gender`, `role`, `date1`) 
				VALUES (NULL, '$f_name', '$m_name', '$l_name', '$user', '$pass2', '$age', '$gender', '$role', CURRENT_TIMESTAMP)";
			$run_query = mysqli_query($con,$save_info);
			if($run_query){
				echo"
				<script>
			setTimeout(function() {
        
        swal({
          title: 'Successfully Add Administrator',
          text: '',
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
		}

?>