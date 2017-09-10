<?php
session_start();
if(isset($_SESSION['uid'])){
  header("location:userpage/profile.php");
}
elseif(isset($_SESSION['uid2'])){
  header("location:code.php");
}elseif(isset($_SESSION['gmail'])){
  echo"
    <script>
      
        
        setTimeout(function() {
        swal({
            title: 'You need to activate your Account',
            text: '',
            type: 'error'
        }, function() {
            window.location = 'https://accounts.google.com/ServiceLogin/signinchooser?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin';
        });
    }, 1000);
      </script>
  ";
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
		<div class="header">
			<div class="logo">
				<i class="fa fa-tachometer" style="color:#fff;"></i>
				<span style="color:#fff;">Eminent</span>
			</div>
			<a href="#" class="nav-trigger" ><span></span></a>
				<nav>
					
							<a href="#" id="go" data-toggle="modal" data-target="#myModal1">
							<span><i class="fa fa-user"></i></span>
							<span style="color:white;">Login</span>
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
					<li>
            <a href="product.php">
              <span><i class="fa fa-user"></i></span>
              <span>Product</span>
            </a>
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
            <a href="#" data-toggle="modal" data-target="#myModalforgot">
              <span><i class="fa fa-credit-card-alt"></i></span>
              <span>Forgot Password?</span>
            </a>
          </li>
          
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div class="title">
				&nbsp;<div id="msg12"></div>
			</div>				
		</div>

		<div id="myModal1" class="modal fade" role="dialog" >
  <div class="modal-dialog" >
<div class="modal-body">
         <div class="row">
          <div class="col-sm-12">
            <div id="msglog"></div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Login <a href="#" id="close" class="fa fa-fw fa-times" data-dismiss="modal" style="float:right;"></a>
                </h3>
              </div>
              <div class="panel-body">
                
                  <fieldset>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
                        <input type="gmail" class="form-control" id="gmail"  placeholder="Email">
                        <input type="hidden" class="form-control" id="status" value="Approved">

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                        <input type="password" class="form-control" id="password12"  placeholder="Password">
                      </div>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input name="remember" type="checkbox" value="Remember Me">
                        Remember Me 
                      </label>
                    </div>
                    <input class="btn btn-lg btn-primary btn-block" type="submit" id="login" value="Login">
                  </fieldset>
               
                <p class="m-b-0 m-t">Not signed up? <a href="user_reg.php">Sign up here</a>.</p>
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
<div id="msg"></div>

<div id="myModalforgot" class="modal fade" role="dialog">
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
                        <input type="gmail" class="form-control" id="gmailforgot"  placeholder="Gmail">
                      </div>
                    </div>
                    
                    <input class="btn btn-lg btn-primary btn-block" type="submit" id="submit" value="Submit" data-toggle="modal" data-target="#mymodalsubmit">
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
    <!--<div id="mymodalsubmit" class="modal fade" role="dialog">
  <div class="modal-dialog">
<div class="modal-body">
         <div class="row">
          <div class="col-sm-12">
            <div id="msglog"></div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Login <a href="#" class="fa fa-fw fa-times" data-dismiss="modal" style="float:right;"></a>
                </h3>
              </div>
              <div class="panel-body">
                
                  <fieldset>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
                        <input type="gmail" class="form-control" id="gmail"  placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                        <input type="password" class="form-control" id="password12"  placeholder="Password">
                      </div>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input name="remember" type="checkbox" value="Remember Me">
                        Remember Me 
                      </label>
                    </div>
                    <input class="btn btn-lg btn-primary btn-block" type="submit" id="login" value="Login">
                  </fieldset>
               
                <p class="m-b-0 m-t">Not signed up? <a href="user_reg.php">Sign up here</a>.</p>
                <div class="credits">
                  
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
</div>-->
<div id="msgforgot"></div>
		<div id="slide">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">

							    <ol class="carousel-indicators">
							      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							      <li data-target="#myCarousel" data-slide-to="1"></li>
							      <li data-target="#myCarousel" data-slide-to="2"></li>
							    </ol>

							    <!-- Wrapper for slides -->
							    <div class="carousel-inner">
							      <div class="item active">
							        <img src="images/product/1.jpg"  style="width:100%;height:300px;opacity:0.8;">
							      </div>

							      <div class="item">
							        <img src="images/product/2.jpg" style="width:100%;height:300px;opacity:0.8;">
							      </div>
							    
							      <div class="item">
							        <img src="images/product/3.jpg" style="width:100%;height:300px;opacity:0.8;">
							      </div>
							    </div>

							    <!-- Left and right controls -->
							    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
							      <span class="glyphicon glyphicon-chevron-left"></span>
							      <span class="sr-only">Previous</span>
							    </a>
							    <a class="right carousel-control" href="#myCarousel" data-slide="next">
							      <span class="glyphicon glyphicon-chevron-right"></span>
							      <span class="sr-only">Next</span>
							    </a>
						
				
		</div>
		</div>
		<div id="pic">
			
          <h2 class="block-title" style="margin-left:20px;">
            Products Sales
          </h2>
          <p style="margin-left:20px;">We give consideration for our future and loyal customers to achieve their goals and to become successful business man in the near future.</p>
          <div class="item-carousel" data-toggle="owlcarousel" data-owlcarousel-settings='{"items":4, "pagination":false, "navigation":true, "itemsScaleUp":true}'>
            <div class="item">
              <a href="#" class="overlay-wrapper">
                <img src="images/product/metal mo.png" alt="Project 1 image" class="img-responsive underlay" style="width:260px;">
                <span class="overlay">
                  <span class="overlay-content"> <span class="h4">Metal Screw</span></span>
                </span>
              </a>
              <div class="item-details bg-noise">
                <h4 class="item-title">
                  <a href="ew.php">Metal Screw</a>
                  <i style="float:right;color:#35475e;font-size:15px;">17%off</i>
                </h4>
                <a href="#" class="btn btn-more" style="color:#ff8000;"><i class="fa fa-plus"></i>View Details</a>
                <del>&#8369;900.00</del>&nbsp;<b>&#8369;700.00</b>
              </div>
            </div>
            <div class="item">
              <a href="#" class="overlay-wrapper">
                <img src="images/product/wood mo.png" alt="Project 2 image" class="img-responsive underlay" style="width:260px;">
                <span class="overlay">
                  <span class="overlay-content"> <span class="h4">Wood Screw</span> </span>
                </span>
              </a>
              <div class="item-details bg-noise">
                <h4 class="item-title">
                  <a href="#">Wood Screw</a>
                </h4>
                <a href="#" class="btn btn-more" style="color:#ff8000;"><i class="fa fa-plus"></i>Read more</a>
                <del>&#8369;800.00</del>&nbsp;<b>&#8369;500.00</b>
              </div>
            </div>
            <div class="item">
              <a href="#" class="overlay-wrapper">
                <img src="images/showcase/project3.png" alt="Project 3 image" class="img-responsive underlay" style="width:260px;">
                <span class="overlay">
                  <span class="overlay-content"> <span class="h4">Project 3</span> </span>
                </span>
              </a>
              <div class="item-details bg-noise">
                <h4 class="item-title">
                  <a href="#">Project 3</a>
                </h4>
                <a href="#" class="btn btn-more" style="color:#ff8000;"><i class="fa fa-plus"></i>Read more</a>
              </div>
            </div>
            <div class="item">
              <a href="#" class="overlay-wrapper">
                <img src="images/showcase/project4.png" alt="Project 4 image" class="img-responsive underlay" style="width:260px;">
                <span class="overlay">
                  <span class="overlay-content"> <span class="h4">Project 4</span> </span>
                </span>
              </a>
              <div class="item-details bg-noise">
                <h4 class="item-title">
                  <a href="#">Project 4</a>
                </h4>
                <a href="#" class="btn btn-more" style="color:#ff8000;"><i class="fa fa-plus"></i>Read more</a>
              </div>
            </div>
            
            </div>
          </div>
       
				<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<div class="modal-body">
         <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Login <a href="#" class="fa fa-fw fa-times" data-dismiss="modal" style="float:right;"></a>
                </h3>
              </div>
              <div class="panel-body">
                <form accept-charset="UTF-8" role="form">
                  <fieldset>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                      </div>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input name="remember" type="checkbox" value="Remember Me">
                        Remember Me 
                      </label>
                    </div>
                    <input class="btn btn-lg btn-primary btn-block" type="submit" id="login" name="login" value="Login">
                  </fieldset>
                </form>
                <p class="m-b-0 m-t">Not signed up? <a href="user_reg.php">Sign up here</a>.</p>
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
		
        
</div>
<div><br><div>
<div class="block block-pd-sm block-bg-primary">
      <div class="container">
        <div class="row">
          <h3 class="col-md-4" style="padding-top:10px;">
            Some of our Clients
          </h3>
          <div class="col-md-8">
            <div class="row">
              <!--Client logos should be within a 120px wide by 60px height image canvas-->
              <div class="col-xs-6 col-md-4">
                <a href="https://bootstrapmade.com" title="Client 1">
                  <img src="images/anaconda.png" alt="Client 1 logo" class="img-responsive">
                </a>
              </div>
              <div class="col-xs-6 col-md-4">
                <a href="https://bootstrapmade.com" title="Client 2">
                  <img src="images/nikel.png" alt="Client 2 logo" class="img-responsive">
                </a>
              </div>
              <div class="col-xs-6 col-md-4">
                <a href="https://bootstrapmade.com" title="Client 3">
                  <img src="images/buffalo.png" alt="Client 3 logo" class="img-responsive">
                </a>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
 <footer id="footer" class="block block-bg-grey-dark" data-block-bg-img="images/bg_footer-map.png" data-stellar-background-ratio="0.4">
      <div class="container">
        
        <div class="row" id="contact">
          
          <div class="col-md-3">
            <address style="padding-top:30px;">
              <strong>Flexor Bootstrap Theme Inc</strong>
              <br>
              <i class="fa fa-map-pin fa-fw text-primary"></i> Samsun Andrade St.
              <br>
              <i class="fa fa-phone fa-fw text-primary"></i> 09127925287
              <br>
              <i class="fa fa-envelope-o fa-fw text-primary"></i> emc@gmail.com
              <br>
            </address>
          </div>
          
          <div class="col-md-6" style="padding-top:30px;">
            <h4 class="text-uppercase">
              Contact Us
            </h4>
          
              
              
              
             <div class="form">
              
              <form method="POST" role="form" class="contactForm">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="gmail1" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validation"></div>
                  </div>
                  <div class="text-center"><button type="submit" id="send_message1">Send Message</button></div>
              </form>
            </div>
            
          </div>
          
          <div class="col-md-3">
            
            <!--social media icons-->
            
          </div>
          
        </div>
        
        <div class="row subfooter">
          <!--@todo: replace with company copyright details-->
          <div class="col-md-7">
            <p>Copyright © EMC</p>
            <div class="credits">
              <!-- 
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Flexor
              -->
              <a href="https://bootstrapmade.com/">Eminent Metal Corporation</a>
            </div>
          </div>
          <div class="col-md-5">
            <ul class="list-inline pull-right">
              <li><a href="#">Terms</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
        </div>
        
        <a href="#top" class="scrolltop">Top</a> 
        
      </div>
    </footer>
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