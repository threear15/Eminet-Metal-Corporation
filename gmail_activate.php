<?php
session_start();
if(!isset($_SESSION['gmail'])){
  header("location:index.php");
}

 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Eminent Metal Corporation</title>
    <script src="dist/sweetalert.js"></script>
    <link rel="stylesheet" href="dist/sweetalert.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    	<link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">
    	<link href="lib/owlcarousel/owl.theme.min.css" rel="stylesheet">
    	<link href="lib/owlcarousel/owl.transitions.min.css" rel="stylesheet">
  <!-- Ionicons -->
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="main.css">
		<link rel="stylesheet" type="text/css" href="pic.css">


		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="js/jquery.min.js"></script>
		<script scrc="js/bootstrap.min.js"></script>
		<script src="main.js"></script>


		

	</head>
	<body>
		<?php 
echo "hi".$_SESSION['approved'];
    ?>
    <div class="container-fluid">
      
      <div class="row">
        
        <div class="col-md-4"></div>
      
        <div class="col-md-4">
          <input type="text" class="form-control" value="<?php 
     echo "".$_SESSION['gmail'];

    ?>" disabled>
        </div>
        
        <div class="col-md-4"></div>
      
      </div>
      
  </div>
  <div><br></div>
<center><div class="btn btn-success">Activate My Account</div></center>
    <a href="logout_gmail.php">logout</a>
<script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/stellar/stellar.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="contactform/contactform.js"></script>
	<script src="js/custom.js"></script>
    
    <!--Custom scripts demo background & colour switcher - OPTIONAL -->
    
    
    <!--Contactform script -->
    <script src="contactform/contactform.js"></script>
	</body>
</html>