
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
	$sql = "SELECT * FROM cart_pending WHERE p_id = '$p_id'AND user_id='$user_id'";
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
			
        
        setTimeout(function() {
        swal({
            title: 'Product Added',
            text: '',
            type: 'success'
        }, function() {
            window.location = '../userpage/profile.php';
        });
    }, 1);
			</script>";
		
		}
	}
}
if(isset($_POST['cart_count'])){
	$uid = $_SESSION['uid'];
	$sql = "SELECT * FROM cart_pending WHERE user_id ='$uid'";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}
if(isset($_POST['cart_count_admin'])){
	$sql = "SELECT * FROM product";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}
if(isset($_POST['count_customer'])){
	$sql = "SELECT * FROM user";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}
if(isset($_POST['count_superadmin'])){
	$sql = "SELECT * FROM super_admin WHERE role ='Super Admin'";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}
if(isset($_POST['count_admin'])){
	$sql = "SELECT * FROM super_admin WHERE role ='Admin'";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}
if(isset($_POST['cart_checkout'])){
	error_reporting(0);
	$uid = $_SESSION['uid'];
	$sql = "SELECT * FROM cart_pending WHERE user_id='$uid'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0){
		$total_amt = 0;
		while($row = mysqli_fetch_array($run_query)){
			$id = $row['id'];
			$p_id = $row['p_id'];
			$p_code = $row['product_code'];
			$user_id = $row['user_id'];
			$p_name= $row['product_name'];
			$p_headstyle = $row['product_headstyle'];
			$p_color = $row['product_color'];
			$p_size = $row['product_size'];
			$p_image = $row['product_image'];
			$p_qty = $row['product_quantity'];
			$p_price = $row['product_price'];
			$p_total = $row['product_total'];
			$new_total = $p_price * $p_qty;
			$price_array = array($new_total);
			$total_sum = array_sum($price_array);
			$total_amt = $total_amt + $total_sum;
			setcookie("ta",$total_amt,strtotime("+1 day"),"/","","",TRUE);

			
			echo "
			<center><div class='row'>
                        <div class='col-md-1'><b>$p_code</b></div>
                        <div class='col-md-1'><b>$p_name</b></div>
                        <div class='col-md-1'><b><img src='../images/standard/$p_image' style='width:80px;height:90px;'></b></div>
                        <div class='col-md-2'><input type='text' class=' form-control size1' pid='$p_id' id='size1-$p_id' value='$p_size' disabled></div>
                        <div class='col-md-1'><input type='number' min='1' class='form-control qty' pid='$p_id' id='qty-$p_id' value='$p_qty'></div>
                        <div class='col-md-1'><input type='text' class='form-control price' pid='$p_id' id='price-$p_id' value='$p_price' disabled></div>
                        <div class='col-md-2'><select class='selectpicker form-control color' pid='$p_id' id='color-$p_id' ><option>$p_color</option><option>Black</option><option>Bright Sink</option><option>Tetanize</option></select></div>
                        <div class='col-md-1'><input type='text' class='form-control total' pid='$p_id' id='total-$p_id' value='$new_total' disabled></div>
                        <div class='col-md-2'>
                          <div class='btn-group'>
                            <a href='#' remove_id='$p_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
                            <a href='#' update_id='$p_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
                          </div>
                        </div>
                      </div></center>
                      <div><br></div>


			"; 

		}
	}
	if(isset($_POST['cart_checkout'])){
		echo"
			<div>
			<b style='padding-left:80%;'>Total Price &#8369;$total_amt.00</b>
			</div>
		";
	}
	echo '
		
				<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
				  <input type="hidden" name="cmd" value="_cart">
				  <input type="hidden" name="business" value="EminentCorporation@gmail.com">
				  <input type="hidden" name="upload" value="1">';
				  
				  $x=0;
				  $uid = $_SESSION["uid"];
				  $gmail = $_SESSION['gmail'];
				  $sql = "SELECT * FROM cart_pending WHERE user_id = '$uid'";
				  $run_query = mysqli_query($con,$sql);
				  while($row=mysqli_fetch_array($run_query)){
					  $x++;
				 echo  '
				 <input type="hidden" name="item_name_'.$x.'" value="'.$row['product_name'].'">
				  <input type="hidden" name="item_number_'.$x.'" value="'.$row['product_code'].'">
				  <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
				  <input type="hidden" name="quantity_'.$x.'" value="'.$row["product_quantity"].'">';
				  
				  }
				  
				echo   '
				<input type="hidden" name="return" value="http://localhost/emcfinal/userpage/payment_success.php"/>
				<input type="hidden" name="cancel_return" value="http://localhost/emcfinal/userpage/profile.php"/>
				<input type="hidden" name="currency_code" value="USD"/>
				<input type="hidden" name="custom" value="'.$uid.'"/>
				
				  <!-- Set variables that override the address stored with PayPal. -->
				  <input type="hidden" name="first_name" value="'.$uid.'">
				  <input type="hidden" name="last_name" value="'.$gmail.'">
				  
				<input style="float:right;margin-right:80px;width:200px;" type="image" name="submit"
					src="../images/pic.png" alt="PayPal Checkout"
					alt="PayPal - The safer, easier way to pay online">
				</form>';
}
if(isset($_POST['remove_from_cart'])){
	$p_id = $_POST['remove_id'];
	$uid = $_SESSION['uid'];
	$sql = "DELETE FROM cart_pending WHERE user_id = '$uid' AND p_id='$p_id'";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
		echo "
		<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Product Removed',
            text: '',
            type: 'error'
        }, function() {
            window.location = '../userpage/cart_pending.php';
        });
    }, 1);
			</script>
		";
	}
}
if(isset($_POST['update_from_cart'])){
	$uid = $_SESSION['uid'];
	$p_id = $_POST['update_id'];
	$qty = $_POST['qty'];
	$size = $_POST['size'];
	$price = $_POST['price'];
	$color = $_POST['color'];
	$total = $_POST['total'];
	if($qty <= 0){
		echo"
		<script>
		        swal({
		          title: 'Warning!!!',
		          text: 'Invalid Quantity!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
		";exit();
	}
	$sql = "UPDATE cart_pending SET product_quantity = '$qty', product_price = '$price', product_color = '$color', product_size = '$size', product_total = '$total' WHERE user_id='$uid' AND p_id='$p_id'";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
		echo "
		<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Product Updated',
            text: '',
            type: 'success'
        }, function() {
            window.location = '../userpage/cart_pending.php';
        });
    }, 1);
			</script>
		";
	}
}
if(isset($_POST['cart_print'])){
	$uid = $_SESSION['uid'];
	$sql = "SELECT * FROM cart_approved WHERE user_id = $uid";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0){
		$total_amt = 0;
		while($row=mysqli_fetch_array($run_query)){
			$id = $row['id'];
			$p_id = $row['p_id'];
			$p_code = $row['product_code'];
			$user_id = $row['user_id'];
			$p_name= $row['product_name'];
			$p_headstyle = $row['product_headstyle'];
			$p_color = $row['product_color'];
			$p_size = $row['product_size'];
			$p_image = $row['product_image'];
			$p_qty = $row['product_quantity'];
			$p_price = $row['product_price'];
			$p_total = $row['product_total'];
			$new_total = $p_price * $p_qty;
			$price_array = array($new_total);
			$total_sum = array_sum($price_array);
			$total_amt = $total_amt + $total_sum;
			$date = $row['data1'];
			
			echo '
			
						
						
						<tr>
						<td>'.$p_name.'</td>
    					<td>'.$p_qty.'</td>
    					<td>'.$p_color.'</td>
    					<td>'.$p_size.'</td>
    					<td>'.$p_headstyle.'</td>
    					<td>&#8369;'.$p_price.'.00</td>
    					<td>&#8369;'.$new_total.'.00</td>
    					<td>&#8369;'.$date.'.00</td>
    					</tr>
    					

			';
		}
	}
	if(isset($_POST['cart_print'])){
		error_reporting(0);
		echo'

			<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						
						<td>Total Amount</td>
						<td>&#8369;'.$total_amt.'.00</td>
    					
    					</tr>
		';
	}
}
if(isset($_POST['personal_info'])){
	$uid = $_SESSION['uid'];
	$sql = "SELECT * FROM cart_approved INNER JOIN user WHERE user_id = $uid";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0){
		$total_amt = 0;
		$row=mysqli_fetch_array($run_query);
			$id = $row['id'];
			$p_id = $row['p_id'];
			$p_code = $row['product_code'];
			$user_id = $row['user_id'];
			$p_name= $row['product_name'];
			$p_headstyle = $row['product_headstyle'];
			$p_color = $row['product_color'];
			$p_size = $row['product_size'];
			$p_image = $row['product_image'];
			$p_qty = $row['product_quantity'];
			$p_price = $row['product_price'];
			$p_total = $row['product_total'];
			$new_total = $p_price * $p_qty;
			$price_array = array($new_total);
			$total_sum = array_sum($price_array);
			$total_amt = $total_amt + $total_sum;
			
			echo '
			
						
						
						<div class="row">
							<div class="col-md-3">
								<img src="../images/avatar3.png" style="width:70px;height:70px;">
							</div>
							
							<div class="col-md-6">
								<b>Name:</b>'.$_SESSION['name'].'
								<br>
								<b>Email-Address:</b>'.$_SESSION['gmail'].'
								<br>
								<b>Phone #:</b>'.$row['m_number'].'
								<br>
								<b>Tell No:</b>'.$row['tel_number'].'
							</div>
						</div>
    					

			';
		
	}
}
if(isset($_POST["addwidar"])){
	echo "
<script>
		        swal({
		          title: 'Warning!!!',
		          text: 'Sign In First!!!',
		          type: 'warning',
		          confirmButtonClass: 'btn-warning',
		          confirmButtonText: 'Ok'
		        });
			</script>
	";
}

?>

