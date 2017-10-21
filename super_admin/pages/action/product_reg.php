<?php
	include "connection/connection.php";
function add_product(){
	if(isset($_POST['add_product'])){
		GLOBAL $con;
		$file=$_FILES['image']['tmp_name'];
			$image1= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);
$location=mysqli_real_escape_string($con,"images/" . $_FILES["image"]["name"]);
$p_code= $_POST['p_code'];
$p_name = $_POST['p_name'];
$p_style = $_POST['p_style'];
$p_price = $_POST['p_price'];
$p_category = $_POST['p_category'];
$p_quantity = $_POST['p_quantity'];
$p_stocks = $_POST['p_stocks'];
$p_color = $_POST['p_color'];
$p_size = $_POST['p_size'];


$name = "/^[A-Z][a-zA-z ]+$/";
$number = "/^[0-9]+$/";

	$sql = "INSERT INTO `product` (`product_id`, `product_code`, `product_cat1`,`product_name`, `product_headstyle`, `product_pieces`, `product_color`, `product_size`, `product_price`, `product_image`, `product_stocks`, `product_keyword`, `product_description`, `date1`) 
	VALUES (NULL, '$p_code', '$p_category', '$p_name', '$p_style', '$p_stocks', '$p_color', '$p_size', '$p_price', '$location', '$p_quantity', '', '', CURRENT_TIMESTAMP)";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
	echo "
			<script>
		        setTimeout(function() {
        swal({
            title: 'Successfully Add new Product',
            text: '',
            type: 'success'
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