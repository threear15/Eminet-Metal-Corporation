<?php 
include "../connection.php";
function get_cart_cod(){
	GLOBAL $con;
	$uid = 			$_SESSION['uid'];
	$f_name =  		$_SESSION['name'];
	$m_name =		$_SESSION['m_name'];
	$l_name =		$_SESSION['l_name'];
	$gmail =		$_SESSION['gmail'];
	$m_number =		$_SESSION['number'];
	$tel_number =	$_SESSION['tel_number'];
	$brgy =			$_SESSION['brgy'];
	$city =			$_SESSION['city'];
	$h_address =	$_SESSION['h_address'];
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
			$p_qty1 = $row['product_quantity'];
			$p_price = $row['product_price'];
			$p_total = $row['product_total'];
			$_SESSION['qty'] = $row['product_quantity'];
			$_SESSION['pid'] = $row['p_id'];
			$new_total = $p_price * $p_qty1;
			$price_array = array($new_total);
			$total_sum = array_sum($price_array);
			$total_amt = $total_amt + $total_sum;
			echo"
			<tr>
				<tbody>
				<td><input type='text' class='form-control' value='$p_name' disabled></td>
				<td><input type='text' class='form-control' value='$p_color' disabled></td>
				<td><input type='text' class='form-control' value='$p_size' disabled></td>
				<td><input type='text' class='form-control' value='$p_price' disabled></td>
				<td><input type='text' class='form-control' value='$p_qty1' disabled></td>
				</tbody>
			</tr>
			";
			
		}echo"
			<td colspan='5'>
			<b style='padding-left:80%;'>Total Price &#8369;$total_amt.00</b>
			</td>
		";
	}
	
}
function get_receipt_cod(){
	if(isset($_POST['send-receipt'])){
		GLOBAL $con;
		$file=$_FILES['image']['tmp_name'];
		$image1= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name= addslashes($_FILES['image']['name']);
		move_uploaded_file($_FILES["image"]["tmp_name"],"../images/" . $_FILES["image"]["name"]);
		$location3=mysqli_real_escape_string($con,"../images/" . $_FILES["image"]["name"]);
		

		$id = $_SESSION['uid'];
		$sql = "INSERT INTO `cod_tbl` (`id`, `uid`,`image_receipt`) 
			VALUES (NULL, '$id','$location3')";
		$run_query = mysqli_query($con,$sql);
		if($run_query){
			$sql = "DELETE FROM cart_pending WHERE user_id ='$id'";
			$run_query = mysqli_query($con,$sql);
			if($run_query){
							echo "
		<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Sent',
            text: 'Please wait for confirmation of your order',
            type: 'success'
        }, function() {
            window.location = 'cart_pending.php';
        });
    }, 1);
			</script>
			";
			}

		}
	}

}
function get_cart_palawan(){
	GLOBAL $con;
	$uid = 			$_SESSION['uid'];
	$f_name =  		$_SESSION['name'];
	$m_name =		$_SESSION['m_name'];
	$l_name =		$_SESSION['l_name'];
	$gmail =		$_SESSION['gmail'];
	$m_number =		$_SESSION['number'];
	$tel_number =	$_SESSION['tel_number'];
	$brgy =			$_SESSION['brgy'];
	$city =			$_SESSION['city'];
	$h_address =	$_SESSION['h_address'];
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
			$p_qty1 = $row['product_quantity'];
			$p_price = $row['product_price'];
			$p_total = $row['product_total'];
			$_SESSION['qty'] = $row['product_quantity'];
			$_SESSION['pid'] = $row['p_id'];
			$new_total = $p_price * $p_qty1;
			$price_array = array($new_total);
			$total_sum = array_sum($price_array);
			$total_amt = $total_amt + $total_sum;
			echo"
			<tr>
				<tbody>
				<td><input type='text' class='form-control' value='$p_name' disabled></td>
				<td><input type='text' class='form-control' value='$p_color' disabled></td>
				<td><input type='text' class='form-control' value='$p_size' disabled></td>
				<td><input type='text' class='form-control' value='$p_price' disabled></td>
				<td><input type='text' class='form-control' value='$p_qty1' disabled></td>
				</tbody>
			</tr>
			";
			
		}echo"
			<td colspan='5'>
			<b style='padding-left:80%;'>Total Price &#8369;$total_amt.00</b>
			</td>
		";
	}
	
}
function get_receipt_palawan(){
	if(isset($_POST['send-receipt'])){
		GLOBAL $con;
		$file=$_FILES['image']['tmp_name'];
		$image1= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name= addslashes($_FILES['image']['name']);
		move_uploaded_file($_FILES["image"]["tmp_name"],"../images/" . $_FILES["image"]["name"]);
		$location3=mysqli_real_escape_string($con,"../images/" . $_FILES["image"]["name"]);
		

		$id = $_SESSION['uid'];
		$sql = "INSERT INTO `palawan_express_tbl` (`id`, `uid`,`image_receipt`) 
			VALUES (NULL, '$id','$location3')";
		$run_query = mysqli_query($con,$sql);
		if($run_query){
			$sql = "DELETE FROM cart_pending WHERE user_id ='$id'";
			$run_query = mysqli_query($con,$sql);
			if($run_query){
							echo "
		<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Sent',
            text: 'Please wait for confirmation of your order',
            type: 'success'
        }, function() {
            window.location = 'cart_pending.php';
        });
    }, 1);
			</script>
			";
			}

		}
	}

}

function get_cart_cheque(){
	GLOBAL $con;
	$uid = 			$_SESSION['uid'];
	$f_name =  		$_SESSION['name'];
	$m_name =		$_SESSION['m_name'];
	$l_name =		$_SESSION['l_name'];
	$gmail =		$_SESSION['gmail'];
	$m_number =		$_SESSION['number'];
	$tel_number =	$_SESSION['tel_number'];
	$brgy =			$_SESSION['brgy'];
	$city =			$_SESSION['city'];
	$h_address =	$_SESSION['h_address'];
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
			$p_qty1 = $row['product_quantity'];
			$p_price = $row['product_price'];
			$p_total = $row['product_total'];
			$_SESSION['qty'] = $row['product_quantity'];
			$_SESSION['pid'] = $row['p_id'];
			$new_total = $p_price * $p_qty1;
			$price_array = array($new_total);
			$total_sum = array_sum($price_array);
			$total_amt = $total_amt + $total_sum;
			echo"
			<tr>
				<tbody>
				<td><input type='text' class='form-control' value='$p_name' disabled></td>
				<td><input type='text' class='form-control' value='$p_color' disabled></td>
				<td><input type='text' class='form-control' value='$p_size' disabled></td>
				<td><input type='text' class='form-control' value='$p_price' disabled></td>
				<td><input type='text' class='form-control' value='$p_qty1' disabled></td>
				</tbody>
			</tr>
			";
			
		}echo"
			<td colspan='5'>
			<b style='padding-left:80%;'>Total Price &#8369;$total_amt.00</b>
			</td>
		";
	}
	
}
function get_receipt_cheque(){
	if(isset($_POST['send-receipt'])){
		GLOBAL $con;
		$file=$_FILES['image']['tmp_name'];
		$image1= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name= addslashes($_FILES['image']['name']);
		move_uploaded_file($_FILES["image"]["tmp_name"],"../images/" . $_FILES["image"]["name"]);
		$location3=mysqli_real_escape_string($con,"../images/" . $_FILES["image"]["name"]);
		

		$id = $_SESSION['uid'];
		$sql = "INSERT INTO `cheque_tbl` (`id`, `uid`,`image_receipt`) 
			VALUES (NULL, '$id','$location3')";
		$run_query = mysqli_query($con,$sql);
		if($run_query){
			$sql = "DELETE FROM cart_pending WHERE user_id ='$id'";
			$run_query = mysqli_query($con,$sql);
			if($run_query){
							echo "
		<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Sent',
            text: 'Please wait for confirmation of your order',
            type: 'success'
        }, function() {
            window.location = 'cart_pending.php';
        });
    }, 1);
			</script>
			";
			}

		}
	}

}

 ?>