<?php
include "connection.php";
session_start();
$uid = $_SESSION['uid'];
$f_name = $_POST['f_name'];
$trans_id = $_POST['trans_id'];
$amount = $_POST['amount'];
$sql = "INSERT INTO `received_payment` (`id`, `uid`, `pid`, `amount`, `transaction_id`)
 VALUES (NULL, '$f_name', '0', '$amount', '$trans_id')";
 $run_query = mysqli_query($con,$sql);
 if($run_query){
 	$sql1 = "DELETE FROM cart_pending WHERE user_id = '$uid'";
 	$run_query1 = mysqli_query($con,$sql1);
 	if($run_query1){
 		echo "
			<script>
			setTimeout(function() {
        
        swal({
          title: 'Thankyou for Continuing Shooping',
          text: '',
          type: 'success',
          confirmButtonClass: 'btn-success',
          confirmButtonText: 'Success!'
      },function() {
            window.location = '../index.php';
        });
     	 }, 1000);
			</script>
		";
 	}
	}
?>