<?php 	
include "connection/connection.php";

function admin_picture(){
	if(isset($_POST['btn_upload_image'])){
		GLOBAL $con;
		$file=$_FILES['image1']['tmp_name'];
			$image1= addslashes(file_get_contents($_FILES['image1']['tmp_name']));
			$image_name= addslashes($_FILES['image1']['name']);
			move_uploaded_file($_FILES["image1"]["tmp_name"],"images/" . $_FILES["image1"]["name"]);
		$location1=mysqli_real_escape_string($con,"images/" . $_FILES["image1"]["name"]);

		$id = $_SESSION['admin_id'];
		$sql = "UPDATE super_admin SET image = '$location1' WHERE id ='$id'";
		$run_query = mysqli_query($con,$sql);
		if($run_query){
			echo"
				<script>
			
        
        setTimeout(function() {
        swal({
            title: 'SUCCESS',
            text: 'Successfully Change Picture',
            type: 'success',
        }, function() {
            window.location = 'index.php';
        });
    }, 1);
			</script>
			";
		}
	}
}

 ?>