<?php 
include "../connection.php";
function add_product(){
	include "../connection.php";
GLOBAL $con;
		
		if(isset($_POST['btn_addproduct'])){
			$p_code 	= mysqli_real_escape_string($con, $_POST['p_code']);
			$p_name		= mysqli_real_escape_string($con, $_POST['p_name']);
			$p_price	= mysqli_real_escape_string($con, $_POST['p_price']);
			$p_stock	= mysqli_real_escape_string($con, $_POST['p_stock']);
			$p_color	= mysqli_real_escape_string($con, $_POST['p_color']);
			$p_size		= mysqli_real_escape_string($con, $_POST['p_size']);
			$p_style	= mysqli_real_escape_string($con, $_POST['p_style']);
			$p_pieces	= mysqli_real_escape_string($con, $_POST['p_pieces']);
			$p_image	= mysqli_real_escape_string($con, $_POST['p_image']);
			if(empty($p_name) || empty($p_price) || empty($p_color) ||
				empty($p_size) || empty($p_style) || empty($p_pieces) || empty($p_image)){
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
				$save_info = "INSERT INTO `product` (`product_id`, `product_code`, `product_cat1`, `product_cat2`, `product_name`, `product_headstyle`, `product_pieces`, `product_color`, `product_size`, `product_price`, `product_image`, `product_stocks`, `product_keyword`, `product_description`, `date1`) 
				VALUES (NULL, '$p_code', '', '', '$p_name', '$p_style', '$p_pieces', '$p_color', '$p_size', '$p_price', '$p_image', '$p_stock', '', '', CURRENT_TIMESTAMP)";
			$run_query = mysqli_query($con,$save_info);
			if($run_query){
				echo"
				<script>
			setTimeout(function() {
        
        swal({
          title: 'Successfully Add Product',
          text: '',
          type: 'success',
          confirmButtonClass: 'btn-success',
          confirmButtonText: 'Success!'
      },function() {
            window.location = 'product_modify.php';
        });
     	 }, 1);
			</script>
				";
			}
			}
			

			}
		}
	


?>
