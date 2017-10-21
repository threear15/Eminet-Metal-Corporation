<?php 

include "../connection.php";
session_start();
$faq_long = $_POST['faq_long'];
$collapse = $_POST['collapse'];
if(empty($faq_long) || empty($collapse)){
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
	$sql = "INSERT INTO `faq_tbl` (`id`, `question`,`collapse`) VALUES (NULL, '$faq_long','$collapse')";
$run_query = mysqli_query($con,$sql);
if($run_query){
	echo"
	<script>
			
        
        setTimeout(function() {
        swal({
            title: 'Successfully Add New FAQs',
            text: '',
            type: 'success'
        }, function() {
            window.location = 'index.php';
        });
    }, 1000);
			</script>
	";
}
}

?>