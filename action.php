
<?php 
session_start();
include "connection.php";

if(isset($_POST['category1'])){
	$category1_query = "SELECT * FROM category_1 INNER JOIN category_2";
	$run_query = mysqli_query($con,$category1_query);
	echo "
	<li class='dropdown'>
            <a href='#' class='dropbtn'>

              <span><i class='fa fa-envelope'></i></span>
              <span>Products</span>

            </a>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid1 = $row['cat1_id'];
			$cat1_name = $row['cat1_name'];
			$cid2 = $row['cat2_id'];
			$cat2_name = $row['cat2_name'];
			
 			echo "
 			<ul>
 				<li class='dropdown-content' style='width:180px;'>
               <a href='tryit_183.htm#''>$cat1_name</a>
               <a href='tryit_183.htm#''>$cat2_name</a>
               
               </li>
               </ul>
 			";
		}
		echo"</li>";
	}
}
if(isset($_POST['addproduct'])){
	$p_id = $_POST['p_id'];
	$color = 'Black';
	$user_id = $_SESSION['uid'];
	$sql = "SELECT * FROM cart_pending WHERE p_id = '$p_id' AND user_id='$user_id'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0){
		echo "<script>
		        swal({
		          title: 'Danger!!!',
		          text: 'Product Already Added!!!',
		          type: 'error',
		          confirmButtonClass: 'btn-danger',
		          confirmButtonText: 'Ok'
		        });
			</script>";
	}else{
		$color = $color;
		$sql = "SELECT * FROM product WHERE product_id ='$p_id'";
		$run_query = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($run_query);
		$id = $row['product_id'];
		$p_code = $row['product_code'];
		$p_name = $row['product_name'];
		$p_image = $row['product_image'];
		$p_headstyle = $row['product_headstyle'];
		$p_size = $row['product_size'];
		$color = $color;
		$p_price = $row['product_price'];
		$sql = "INSERT INTO `cart_pending` (`id`, `p_id`, `user_id`, `product_code`,
		 `product_name`, `product_headstyle`, `product_color`, `product_size`,
		  `product_image`, `product_quantity`, `product_price`, `product_total`, `date1`)
		   VALUES (NULL, '$p_id', '$user_id', '$p_code', '$p_name', '$p_headstyle', '$color', '$p_size', '$p_image',
		    '1', '$p_price', '$p_price', CURRENT_TIMESTAMP);";
		if(mysqli_query($con,$sql)){
			echo "
			<script>
			swal('Success!', 'Product Added!', 'success');
			</script>";
		
		}
	}
}
?>

