<?php
session_start();
include "../connection.php";
GLOBAL $con;
$id = $_SESSION['delete_read_id'];
$sql = "DELETE FROM message WHERE id ='$id'";
 $run_query = mysqli_query($con,$sql);
 if($run_query){
 	echo "
 	<script>window.location.href='messages.php';</script>
 	";
 }
                    
 ?>