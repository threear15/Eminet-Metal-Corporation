<?php
session_start();
include "../connection.php"; 
	$sql = "DELETE FROM product WHERE product_id =".$_SESSION['delete_id_product'];
                    $run_query = mysqli_query($con,$sql);
                    if($run_query){
                    	echo"
                    	<script>
                    		window.location.href ='product_modify.php';
                    	</script>
                    	";
                    }
            
?>