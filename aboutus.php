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
    <link rel="stylesheet" type="text/css" href="css/style1.css">


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
							<span><i class="fa fa-home"></i></span>
							<span>Home</span>
						</a>
					</li>
					<li>
            <a href="product.php">
              <span><i class="fa fa-shopping-bag"></i></span>
              <span>Product</span>
            </a>
          </li>
					<li>
						<a href="aboutus.php">
							<span><i class="fa fa-info-circle"></i></span>
							<span>About Us</span>
						</a>
					</li>
					<li>
						<a href="faq.php">
							<span><i class="fa fa-question"></i></span>
							<span>FAQ's</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span><i class="fa fa-question-circle"></i></span>
							<span>Terms & Conditions</span>
						</a>
					</li>
	         <li>
            <a href="#" data-toggle="modal" data-target="#myModalforgot">
              <span><i class="fa fa-key"></i></span>
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
 <div id="myModalwidar" class="modal fade" role="dialog" >
  <div class="modal-dialog" >
<div class="modal-body">
         <div class="row">
          <div class="col-sm-12">
            <div id="msglog"></div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <h2>Metal Screw</h2>
                </h3>
              </div>
              <div class="panel-body">
               <img src="images/standard/Standard Size Metal Screw Pan Head/7 X 1[4] TO  1 inch.jpg" style="width:100%; height:100%;">
               <h3>
              <div style="color:black;">
                <b style="font-size:19px;">Available color:Bright Sink</b>
              </br>
              <b style="font-size:19px;">Size:7 x 1/4 TO  1 inch</b>
              </br>
                <b style="font-size:19px;">Price:250.00PHP</b>
              </br>
              <b style="font-size:19px;">in-stock</b>
              <div>
                <button class="btn btn-success btn-xs" id="addwidar">Add To Cart</button>
              </div>
              </div>
             </h3>
               </div>
               </div>
              </div>
              </div>
            </div>
          </div>
        </div>
<div id="myModalwidar1" class="modal fade" role="dialog" >
  <div class="modal-dialog" >
<div class="modal-body">
         <div class="row">
          <div class="col-sm-12">
            <div id="msglog"></div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <h2>Wood Screw</h2>
                </h3>
              </div>
              <div class="panel-body">
               <img src="images/standard/Standard Size Wood Screw Flat Head/4 X 3[8] TO 1 inch.jpg" style="width:100%; height:100%;">
              <h3>
              <div style="color:black;">
                <b style="font-size:19px;">Available color:Black</b>
              </br>
              <b style="font-size:19px;">Size:4 x 3/8 TO 1 inch</b>
              </br>
                <b style="font-size:19px;">Price:250.00PHP</b>
              </br>
              <b style="font-size:19px;">in-stock</b>
              <div>
                <button class="btn btn-success btn-xs" id="addwidar1">Add To Cart</button>
              </div>
             </h3>
               </div>
               </div>
              </div>
              </div>
            </div>
          </div>
        </div>
<div id="myModalwidar2" class="modal fade" role="dialog" >
  <div class="modal-dialog" >
<div class="modal-body">
         <div class="row">
          <div class="col-sm-12">
            <div id="msglog"></div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <h2>Cap Screw</h2>
                </h3>
              </div>
              <div class="panel-body">
               <img src="images/standard/Standard Size Cap Screw/M10X15 TO 60 Hexagon Head.jpg" style="width:100%; height:100%;">
              <h3>
              <div style="color:black;">
                <b style="font-size:19px;">Available color:Tentanize</b>
              </br>
              <b style="font-size:19px;">Size:M10 x 15 To 60</b>
              </br>
                <b style="font-size:19px;">Price:300.00PHP</b>
              </br>
              <b style="font-size:19px;">in-stock</b>
              <div>
                <button class="btn btn-success btn-xs" id="addwidar2">Add To Cart</button>
              </div>
             </h3>
               </div>
               </div>
              </div>
              </div>
            </div>
          </div>
        </div>
<div id="myModalwidar3" class="modal fade" role="dialog" >
  <div class="modal-dialog" >
<div class="modal-body">
         <div class="row">
          <div class="col-sm-12">
            <div id="msglog"></div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <h2>Electric Junction Screw</h2>
                </h3>
              </div>
              <div class="panel-body">
               <img src="images/standard/Standard Special Size Electrical Junction Screw/6[32] X 1 TO 2 inches Flat Head.jpg" style="width:100%; height:100%;">
              <h3>
               <div style="color:black;">
                <b style="font-size:19px;">Available color:Bright Sink</b>
              </br>
              <b style="font-size:19px;">Size:6/32 x 1 To 2 inch</b>
              </br>
                <b style="font-size:19px;">Price:300.00PHP</b>
              </br>
              <b style="font-size:19px;">in-stock</b>
              <div>
                <button class="btn btn-success btn-xs" id="addwidar3">Add To Cart</button>
              </div>
             </h3>
               </div>
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
               
                  <a href="#">Eminent Metal Corporation</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   


  </div>
</div>-->
<div id="msgforgot"></div>
		<div id="slide">
      <div class="row">
        <div class="col-md-4">
          <img src="images/companyname.png">

        </div>
        <div class="col-md-8" >
          <p style="font-family: arial">Siya na ang mayaman siya na ang may auto siya na, siya na ang meron ng lahat ng bagay na wala ako. hindi mo sabihin aking napapansin kapag nalagay ka sa alanganin heto nanaman tayo ohhh. Pansamantala unan sa twing nahihirapan Pansamantalang panyo sa twing ikay nasasaktan. Baket ba sakin nalang palagi ang takbo sa twing kayo ay may away ako ang lagi mo karamay hindi nman tayo ohh hindi dibat hindi. Pansamantala Unan sa twing ikay nahihirapan, Pansamantalang pAnyo sa twing nasasaktan kaibigan lang ba maituturing ang hirap namn yata mangapa sa dilim snu ba tlaga saamin ang iyong. pansamantala unan sa twing ikay nahihirapan, pansamantalang panyo sa twing ikay nasasaktan, pansamantala ahh pansamantala pansamantala ahh tanggap ko na.
          </p>
        </div>
      </div>
		</div>
		    <div id="pic">

          <div id="msgaddwidar"></div>
      
          <h2 class="block-title" style="margin-left:20px;">
            Products Sales
          </h2>
          <p style="margin-left:20px;">We give consideration for our future and loyal customers to achieve their goals and to become successful business man in the near future.</p>
          <div class="item-carousel" data-toggle="owlcarousel" data-owlcarousel-settings='{"items":4, "pagination":false, "navigation":true, "itemsScaleUp":true}'>
            <div class="item">
              <a href="#" class="overlay-wrapper">
                <img src="images/standard/Standard Size Metal Screw Pan Head/7 X 1[4] TO  1 inch.jpg" alt="Project 1 image" class="img-responsive underlay" style="width:260px;height:140px;">
                <span class="overlay">
                  <span class="overlay-content"> <span class="h4">Metal Screw</span></span>
                </span>
              </a>
              <div class="item-details bg-noise">
                <h4 class="item-title">
                  <a href="ew.php">Metal Screw</a>
                  <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-dismiss="modal"  data-target="#myModalwidar" style="float:right;">View Details</button>
                </h4>
              </div>
            </div>
            <div class="item">
              <div id="msgaddwidar1"></div>
              <a href="#" class="overlay-wrapper">
                <img src="images/standard/Standard Size Wood Screw Flat Head/4 X 3[8] TO 1 inch.jpg" alt="Project 2 image" class="img-responsive underlay" style="width:260px;height:140px;">
                <span class="overlay">
                  <span class="overlay-content"> <span class="h4">Wood Screw</span> </span>
                </span>
              </a>
              <div class="item-details bg-noise">
                <h4 class="item-title">
                  <a href="#">Wood Screw</a>
                  <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-dismiss="modal"  data-target="#myModalwidar1" style="float:right;">View Details</button>
                </h4>
              </div>
            </div>
            <div class="item">
              <div id="msgaddwidar2"></div>
              <a href="#" class="overlay-wrapper">
                <img src="images/standard/Standard Size Cap Screw/M10X15 TO 60 Hexagon Head.jpg" alt="M6X10 TO M6X60 Hexagon Head image" class="img-responsive underlay" style="width:260px;height:145px;">
                <span class="overlay">
                  <span class="overlay-content"> <span class="h4">Cap Screw</span> </span>
                </span>
              </a>
              <div class="item-details bg-noise">
                <h4 class="item-title">
                  <a href="#">Cap Screw</a>
                  <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-dismiss="modal"  data-target="#myModalwidar2" style="float:right;">View Details</button>
                </h4>
              </div>
            </div>
            <div class="item">
              <div id="msgaddwidar3"></div>
              <a href="#" class="overlay-wrapper">
                <img src="images/standard/Standard Special Size Electrical Junction Screw/6[32] X 1 TO 2 inches Flat Head.jpg" alt="6[30] X 1 TO 2 inches Trus Head" class="img-responsive underlay" style="width:260px;height:145px;">
                <span class="overlay">
                  <span class="overlay-content"> <span class="h4">Electrical Junction sCREW</span> </span>
                </span>
              </a>
              <div class="item-details bg-noise">
                <h4 class="item-title">
                  <a href="#">Junction Screw</a>
                  <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-dismiss="modal"  data-target="#myModalwidar3" style="float:right;">View Details</button>
                </h4>
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
                    <input type="hidden" name="status" value="Pending">
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
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" ></textarea>
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