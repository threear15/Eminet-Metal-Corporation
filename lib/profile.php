<?php
session_start();
if(!isset($_SESSION['uid'])){
	header("location:index.php");
}
?>
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
	<div class="header">
			<div class="logo">
				<i class="fa fa-tachometer" style="color:#fff;"></i>
				<span style="color:#fff;">Eminent</span>
			</div>
			<a href="#" class="nav-trigger" ><span></span></a>
				<nav>
					
							<a href="#" id="go" data-toggle="modal" data-target="#myModal1">
							<span><i class="fa fa-user"></i></span>
							<span style="color:white;"><?php echo "Hi,".$_SESSION['name'];?></span>
						</a>
						
				</nav>
		</div>
		<div class="side-nav">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Eminent</span>
			</div>
			<nav>
				<ul>
					<li class="active">
						<a href="#">
							<span><i class="fa fa-user"></i></span>
							<span>Home</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropbtn">

							<span><i class="fa fa-envelope"></i></span>
							<span>Products</span>

						</a>
						<ul>
						<li class="dropdown-content">
   						 <a href="tryit_183.htm#">Link 1</a>
   						 <a href="tryit_183.htm#">Link 2</a>
    						<a href="tryit_183.htm#">Link 3</a>
  						</li>
						</ul>
					</li>
					<li>
						<a href="#">
							<span><i class="fa fa-bar-chart"></i></span>
							<span>About Us</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Contact Us</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>FAQ's</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Terms & Conditions</span>
						</a>
					</li>
					<li>
						<a href="#" class="sweet-5" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-5']);">
							<span><i class="fa fa-credit-card-alt sweet-5" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-5']);"></i></span>
							<span>Logout</span>
						</a>
					</li>
	
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div class="title">
				&nbsp;
			</div>				
		
  <script>
document.querySelector('.sweet-5').onclick = function(){
        swal({
          title: 'Are you sure you want to Logout?',
          text: ' ',
          type: 'warning',
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'YES',
          cancelButtonText: 'No, Cancel Please!',
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){
            window.location.href="logout.php";

          } 
          else {
            swal('Cancelled', 'Thanks for Staying :)', 'error');
          }
        });
      };
</script>
<a href="#top" class="scrolltop">Top</a> 
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