<?php
session_start();
if(!isset($_SESSION['uid2'])){
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
		<script src="js/jquerynew.js"></script>
		<script src="js/jquery.min.js"></script>
		<script scrc="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
</head>
<body>

<?php 
echo "Copy this code <i class='fa fa-fw fa-arrow-circle-right'></i>"."&nbsp;&nbsp;&nbsp;".$_SESSION['number2'] ."&nbsp;And <a href='verify.php'>Click Here</a>"; 

?>
	<div id="msgforgot"></div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<div class="modal-body">

         <div class="row">
          <div class="col-sm-12">
            <div id="msglog"></div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Forgot Password<a href="#" class="fa fa-fw fa-times" data-dismiss="modal" style="float:right;"></a>
                </h3>
              </div>
              <div class="panel-body">
                
                  <fieldset>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                        <input type="gmail" class="form-control" id="as_number"  placeholder="Gmail" value="<?php echo "".$_SESSION['number2'];?>" disabled>
                      </div>
                      <div><br></div>
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                        <input type="gmail" class="form-control" id="true_number"  placeholder="Type your Mobile Number Ex: 09123456789">
                      </div>
                      <div><br></div>
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                        <input type="gmail" class="form-control" id="true_gmail"  placeholder="Type your Gmail">
                      </div>
                    </div>
                    
                    <input class="btn btn-lg btn-primary btn-block" type="submit" id="submitnumber3" value="Submit">
                  </fieldset>
               
               
                <div class="credits">
                  <!-- 
                    All the links in the footer should remain intact. 
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Flexor
                  -->
                  <a href="#">Eminent Metal Corporation</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- Modal content-->


  </div>
</div>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
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
