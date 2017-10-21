<?php
session_start();
include "../connection.php";
GLOBAL $con;
$id = $_SESSION['edit_id'];
$sql = "DELETE FROM faq_tbl WHERE id ='$id'";
 $run_query = mysqli_query($con,$sql);
 if($run_query){
 	echo "
 	<script>window.location.href='edit_faq.php';</script>
 	";
 }
                    
 ?>