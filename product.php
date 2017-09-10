<?php
session_start();
if(isset($_SESSION['uid'])){
  header("location:userpage/profile.php");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eminent Metal Corporation</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="dist/sweetalert.js"></script>
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
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

<script type="text/javascript" src="../js/js/jquery-1.11.2.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="js/jquerynew.min.js"></script>
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
    <div class="side-nav" id="reg_sidenav">
      <div class="logo">
        <i class="fa fa-tachometer"></i>
        <span>Eminent</span>
      </div>
      <nav>
        <ul>
          <li class="active">
            <a href="index.php">
              <span><i class="fa fa-user"></i></span>
              <span>Home</span>
            </a>
          </li>
          <div id="get_category1"></div>
          <!--<li class="dropdown">
            <a href="#" class="dropbtn">

              <span><i class="fa fa-envelope"></i></span>
              <span>Products</span>

            </a>
            
            <ul>
                
            <li class="dropdown-content" style="width:180px;">
               <a href="tryit_183.htm#">Standard Products</a>
               <a href="tryit_183.htm#">Special Products</a>
                
              </li>
            </ul>
          </li>-->
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
  
        </ul>
      </nav>
    </div>
    <div class="main-content">
      <div class="title">
        &nbsp;<div id="msg12"></div>
        
      </div>        
    </div>

         <div id="slide">
          
       <div class="row">
        <div class="col-md-12">
          
        <table id="example1" class="table table-bordered table-striped">

                        <thead id="shop">
                          <tr>
                            <th style="background:#233245;color:white">Product Code</th>
                            <th style="background:#233245;color:white">Product Name</th>
                            
                            <th style="background:#233245;color:white">Product Image</th>
                            <th style="background:#233245;color:white">Product Size</th>
                            <th style="background:#233245;color:white">Product Price</th>
                            <th style="background:#233245;color:white">Product Color</th>
                            <th style="background:#233245;color:white">Product Status</th>
                            <th style="background:#233245;color:white">Action</th>
                          </tr>
                    </thead >
                    <tbody id='shop'>
                    <?php 
                          include "connection.php";

                          $product_query = "SELECT * FROM product";
                          $run_query = mysqli_query($con,$product_query);
                          if(mysqli_num_rows($run_query) > 0){
                            while($row=mysqli_fetch_array($run_query)){
                              $p_id = $row['product_id'];
                              $p_code = $row['product_code'];
                              $p_name = $row['product_name'];
                              $p_image = $row['product_image'];
                              $p_size = $row['product_size'];
                              $p_price = $row['product_price'];
                              $p_color = $row['product_color'];
                              if($row['product_stocks'] <= 0){
                              
                                  $status = '<button class=" btn btn-danger btn-xs"disabled>Out of Stocks</button>';
                               
                              }else{
                                
                                  $status = '<button class=" btn btn-success"disabled>In Stocks</button>';
                                
                              }
                              if($row['product_stocks'] <= 0){
                              
                                  $add = '<button class=" btn btn-danger"disabled>add to cart</button>';
                               
                              }else{
                                
                                  $add = '<button class="btn btn-success">add to cart</button>';
                                
                              }

                            echo "
                              <tr>
                            <td style='adding-top:40px;padding-left:10px;'><button class='btn btn-success' disabled>$p_code</button></td>
                                              <td style='padding-top:40px;padding-left:10px;'><button class='btn btn-success' disabled>$p_name</button></td>
                                              
                                              <td><img src='images/product/$p_image' style='width:115px;height:100px;'></td>
                                              <td style='padding-top:40px;padding-left:10px;'><select class='btn btn-primary btn-xs'><option>$p_size</option><option>4 by 10</option></select></td>
                                              <td style='padding-top:40px;padding-left:20px;'>&#8369;$p_price.00</td>
                                              <td style='padding-top:40px;padding-left:15px;'><select class='btn btn-primary btn-xs' >$p_color</select></td>
                                             <td>$status</td>
                                              <td style='padding-top:40px;padding-left:15px;'>$add</td>
                           </tr>
                            ";

                              }
                                  }
                                ?>
                          </tbody>
                  </table>
       </div>
   
       </div>
               </div>
        
<div id="myModal1" class="modal fade" role="dialog">
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
                        <span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
                        <input type="text" class="form-control" name="email" id="gmail" placeholder="Email">

                        <input type="hidden" class="form-control" id="status" value="Approved">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                        <input type="password" class="form-control" id="password12" name="password" placeholder="Password">
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

  
      <div id="msg"></div>
<a href="#top" class="scrolltop">Top</a> 

    <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
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
    <script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/pace/pace.min.js"></script>
  </body>
</html>