<?php 
session_start();
if(!isset($_SESSION['uid_admin'])){
	header("location:s_admin_login.php");
}
require_once('bdd.php');


$sql = "SELECT id, title, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eminent Metal Corporation</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> 
  <link href='../css/fullcalendar.css' rel='stylesheet' />
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="../dist/sweetalert.js"></script>
    <link rel="stylesheet" href="../dist/sweetalert.css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link href="../lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">
      <link href="../lib/owlcarousel/owl.theme.min.css" rel="stylesheet">
      <link href="../lib/owlcarousel/owl.transitions.min.css" rel="stylesheet">
  <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" type="text/css" href="../pic.css">
    <link rel="stylesheet" type="text/css" href="../css/style1.css">

<script type="text/javascript" src="../js/js/jquery-1.11.2.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="../js/jquerynew.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script scrc="../js/bootstrap.min.js"></script>

    <script src="../mains.js"></script>


    <style>
    #calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
  div.dataTables_wrapper {
        margin-bottom: 3em;
    }
    </style>

  </head>
  <body>

    <div class="header">
      <div class="logo">
        <i class="fa fa-tachometer" style="color:#fff;"></i>
        <span style="color:#fff;">Eminent</span>
      </div>
      <a href="#" class="nav-trigger" ><span></span></a>
      <nav>
          
              <a href="#" id="go">
              <span><i class="fa fa-user"></i></span>
              <span style="color:white;"><?php echo "".$_SESSION['name_admin'];?></span>
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
              <span>Dashboard</span>
            </a>
          </li>
          
          <li class="dropdown">
            <a href="#" class="dropbtn">

              <span><i class="fa fa-envelope"></i></span>
              <span>Modify Accounts</span>

            </a>
            
            <ul>
                
            <li class="dropdown-content" style="width:180px;">
               <a href="customer_modify.php">Customers</a>
               <a href="tryit_183.htm#" data-toggle="modal" data-target="#customer_edit">Admin</a>
                <a href="tryit_183.htm#">Super Admin</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropbtn">

              <span><i class="fa fa-envelope"></i></span>
              <span>Sales</span>

            </a>
            
            <ul>
                
            <li class="dropdown-content" style="width:180px;">
               <a href="sales_month.php">Every Month</a>
               <a href="sales_year.php">Every Year</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropbtn">

              <span><i class="fa fa-envelope"></i></span>
              <span>Modify Products</span>

            </a>
            
            <ul>
                
            <li class="dropdown-content" style="width:180px;">
               <a href="add_product.php">Add Product</a>
                <a href="tryit_183.htm#">Update Product</a>
                <a href="tryit_183.htm#">Delete Product</a>

              </li>
            </ul>
          </li>
          <li>
            <a href="index1.php">
              <span><i class="fa fa-user"></i></span>
              <span>Delivery Schedule</span>
            </a>
          </li>
            <li>
            <a href="#">
              <span><i class="fa fa-user"></i></span>
              <span>Payment Received</span>
            </a>
          </li>
          <li>
            <a href="#" class="sweet-5" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-5']);" id="logout_me">
              <span><i class="fa fa-credit-card-alt"></i></span>
              <span>Logout</span>
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
    <div class="container">
      <div id="edit_customer"></div>
 
           
          
    </div>
   

         <div id="slide">
<div id="msg_add_product"></div>

          <div id="myModalverify" class="modal fade" role="dialog">
  <div class="modal-dialog">
<center><div class="modal-body">
  
         <div class="row">
         
          <div class="col-sm-12">
            <div id="msglog"></div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                 Add Customer<a href="customer_modify.php" class="fa fa-fw fa-times" style="float:right;"></a>
                </h3>
              </div>
              <div class="panel-body">
                <form method="POST">
                <div class="row">
                  <div class="col-md-4">
                    <label for="f_name">Firstname</label>
                    <input type="text" name="f_name1" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label for="l_name">Lastname</label>
                    <input type="text" name="l_name" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label for="m_name">Middlename</label>
                    <input type="text" name="m_name" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label for="age">Age</label>
                    <input type="text" name="age" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label for="age">Gender</label>
                    <select class="selectpicker form-control" name="gender">
                  <option >Male</option>
                  <option>Female</option>
                 
                </select>

                  </div>
                  <div class="col-md-4">
                    <label for="m_number">Mobile Number</label>
                    <input type="text" name="m_number" class="form-control" placeholder="Ex: 9123456789">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label for="tel_number">Telephone Number</label>
                    <input type="text" name="tel_number" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label for="brgy">Barangay</label>
                    <input type="text" name="brgy" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label for="city">City</label>
                    <input type="text" name="city" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label for="h_address">Home Address</label>
                    <input type="text" name="h_address" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label for="g-mail">G-mail</label>
                    <input type="text" name="g-mail" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label for="password">Password</label>
                    <input type="password" name="password34" class="form-control">
                  </div>
                  <div class="col-md-4">
                    
                  </div>
                  <div class="col-md-4">
                    <label for="password">Status</label>
                    <select class="selectpicker form-control" name="status">
                  <option >Approved</option>
                  <option>Pending</option>
                </select>
                  </div>
                  <div class="col-md-4">
            
                  </div>
                </div>
                
                <div>&nbsp;</div>
                <div class="row">
                  <div class="col-md-12">
                    <center><button class="btn btn-success" id="add_customer">Add Customer</button></center>
                  </div>
                </div>
                </form>
            
   
               
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
<div id="add_customer_msg"></div>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal1').modal('show');
    });
</script>
    <div id="msg_print_receipt"></div>
   <div id="msgadd"></div>


  
      <div id="msg"></div>
<a href="#top" class="scrolltop">Top</a> 
<script>
$(document).ready(function() {
    $('table.display').DataTable();
} );
</script>
<script>
  document.querySelector('.sweet-1').onclick = function(){
        swal("Here's a message!");
      };
</script>
    <script>
  $(function() {
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
            window.location.href="logout_admin.php";

          } 
          else {
            swal('Cancelled', 'Thanks for Staying :)', 'error');
          }
        });
      };
</script>
<script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='../js/moment.min.js'></script>
	<script src='../js/fullcalendar.min.js'></script>
	

  
  
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/stellar/stellar.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../contactform/contactform.js"></script>
  <script src="../js/custom.js"></script>
    
    <!--Custom scripts demo background & colour switcher - OPTIONAL -->
    
    
    <!--Contactform script -->
    <script src="../contactform/contactform.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../plugins/pace/pace.min.js"></script>

  </body>
</html>
