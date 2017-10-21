<?php 
include "../connection.php";

function edit_view_faq(){
	include "../connection.php";
	GLOBAL $con;
	$id = $_SESSION['edit_id'];
	$sql = "SELECT * FROM faq_tbl WHERE id ='$id'";
	$run_query = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($run_query)){
		$id = $row['id'];
		$question = $row['question'];
		echo"
			<form method='POST'>
			<input type='hidden' name='id' value='$id'>
			<textarea style='width:100%;height:100%;' name='textarea'>
			$question
			</textarea>
			<form method='POST'>
			<button type='submit' class='btn btn-success' name='button15'>UPDATE</button>
			</form>
		";
	}if(isset($_POST['button15'])){
		$id = $_POST['id'];
		echo "";
	}
}
?>