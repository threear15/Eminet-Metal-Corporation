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
  <link rel="stylesheet" type="text/css" href="../js/jquery.dataTables.min.css">
  <script src="../js/jquery-1.12.4.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
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
              <span><i class="fa fa-dashboard"></i></span>
              <span>Dashboard</span>
            </a>
          </li>
          
          <li class="dropdown">
            <a href="#" class="dropbtn">

              <span><i class="fa fa-edit"></i></span>
              <span>Modify Accounts</span>

            </a>
            
            <ul>
                
            <li class="dropdown-content" style="width:180px;">
               <a href="customer_modify.php">Customers&nbsp;<?php error_reporting(0); ?><span class='badge' id="badge_customer">0</span></a>
               <a href="admin_modify.php">Admin&nbsp;<?php error_reporting(0); ?><span class='badge' id="badge_admin">0</span></a>
                <a href="superadmin_modify.php">Super Admin&nbsp;<?php error_reporting(0); ?><span class='badge' id="badge_superadmin">0</span></a>
                <a href="add_admin.php">Add Admin</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropbtn">

              <span><i class="fa fa-exchange"></i></span>
              <span>Sales</span>

            </a>
            
            <ul>
                
            <li class="dropdown-content" style="width:180px;">
               <a href="sales_month.php">
                <span><i class="fa fa-calendar"></i></span>
              <span>Every Month</span>
               </a>
               <a href="sales_year.php">
                <span><i class="fa fa-calendar"></i></span>
              <span>Every Year</span>
               </a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropbtn">

              <span><i class="fa fa-edit"></i></span>
              <span>Modify Products</span>

            </a>
            
            <ul>
                
            <li class="dropdown-content" style="width:180px;">
               <a href="add_product.php">Add Product</a>
                <a href="product_modify.php">Edit Product&nbsp;<?php error_reporting(0); ?><span class='badge' id="badge_product_admin">0</span></a>
                   
            
                  

              </li>
            </ul>
          </li>
          <li>
            <a href="index1.php">
              <span><i class="fa fa-calendar"></i></span>
              <span>Delivery Schedule</span>
            </a>
          </li>
            <li>
            <a href="payment_received.php">
              <span><i class="fa fa-credit-card"></i></span>
              <span>Payment Received</span>
            </a>
          </li>
          <li>
            <a href="add_customer.php">
              <span><i class="fa fa-user-md"></i></span>
              <span>Add Customer</span>
            </a>
          </li>
          <li class="dropdown">
            <a href="#">
              <span><i class="fa fa-cogs"></i></span>
              <span>Modify FAQ's</span>
            </a>
            <ul>
                
            <li class="dropdown-content" style="width:180px;">
               <a href="#" data-toggle="modal" data-target="#myModalfaq">Add FAQ's</a>
               <a href="edit_faq.php">Edit FAQ's</a>
               <a href="#" data-toggle="modal" data-target="#myModalfaqcode">FAQ's code</a>
               

              </li>
            </ul>
          </li>
          <li>
            <a href="messages.php">
              <span><i class="fa fa-comment"></i></span>
              <span>Messages&nbsp;<?php error_reporting(0);?><span class='badge' id='badge_messages'>0</span></span>
            </a>
          </li>
          <li>
            <a href="#" class="sweet-5" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-5']);">
              <span><i class="fa fa-sign-out"></i></span>
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
    <!--<div class="container">

  <div class="modal fade" id="customer_edit" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Customer Details</h4>
        </div>
        <div class="modal-body">
          <p>This is a large modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>-->

         <div id="slide" class="table-responsive">
              <div style="width:100%;">
                  <table id="" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>G-mail Address</th>
                <th>message</th>
                <th>date</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>G-mail Address</th>
                <th>message</th>
                <th>date</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
          <?php
          include "../connection.php";
          $sql = "SELECT * FROM message";
            $run_query = mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($run_query)){
              $id = $row['id'];
              $name = $row['name'];
              $gmail = $row['gmail'];
              $message = $row['message'];
              $status = $row['status'];
              $date = $row['date'];

              if($status == 'Pending'){
                $status1 = '<button class="btn btn-danger btn-xs">Pending</button>';
                $action = '
                <form method="POST">
                <input type="hidden" name="id" value="'.$id.'">
                <button class="btn btn-success btn-xs" name="btn-read">Read Me</button>
                <button class="btn btn-warning btn-xs" disabled><b data-toggle="tooltip" title="Read Me First !!!">Delete</button>
                 </form>
                ';
              }else{
               if($status == 'Approved'){
                $status1 = '<button class="btn btn-success btn-xs">Approved</button>';
                $action = '<form method="POST">
                <input type="hidden" name="id" value="'.$id.'">
                <button class="btn btn-danger btn-xs" disabled>Read Me</button>
                <button class="btn btn-warning btn-xs" name="btn-delete">Delete</button>
                </form>';
                }
                
              }if(strlen($message) >= 50){
                $message1 = 'This message was too long...';
              }else{
                $message1 = $message;
              }
              echo'
            
                <tr>
                <td>'.$name.'</td>
                <td>'.$gmail.'</td>
                <td>'.$message1.'</td>
                <td>'.$date.'</td>
                <td>'.$status1.'</td>
                <td>'.$action.'</td>
                </tr>
               
               
                ';
                  }if(isset($_POST['btn-read'])) {
                    $id = $_POST['id'];
                    $_SESSION['read_id'] = $id;
                     echo"
                    <script>window.location.href='read_message.php';</script>
                    ";
                  }if(isset($_POST['btn-delete'])){
                    $id = $_POST['id'];
                    $_SESSION['delete_read_id'] = $id;
                    echo"
                  <script>
                  swal({
                      title: 'Are you sure you want to delete this message?',
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
                          window.location = 'delete_read_function.php';
                        
                      } 
                      else {
                        
                        window.location = 'messages.php';
                      }
                    });
                  </script>
                    ";
                  }    
                 ?>
                  <!--
                <td>Three Ar A. Sempron</td>
                <td>sempronthreear@gmail.com</td>
                <td>Male</td>
                <td>27</td>
                <td><button class="btn btn-primary btn-xs">EDIT</button></td>
            -->
            
        </tbody>
    </table>
              </div>
              
       </div>
               </div>
                 <div class="modal fade" id="myModalfaq" role="dialog">

    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add FAQ's</h4>
          <?php
          include "../connection.php";
          $sql = "SELECT * FROM faq_tbl";
          $run_query = mysqli_query($con,$sql);
          mysqli_num_rows($run_query);
          $true = mysqli_num_rows($run_query);
          $false = $true + 1;
          echo "Change the collapse number into $false";
           ?>
        </div>
        <div class="modal-body">
          <form method="POST">
          <textarea id = "faq_long" name="faq_long" style="width:100%;height:100%;"></textarea>
          <?php
          include "../connection.php";
          $sql = "SELECT * FROM faq_tbl";
          $run_query = mysqli_query($con,$sql);
          $true = mysqli_num_rows($run_query);
          $false = $true + 1;
          echo '<input type="text" name="collapse" value="'.$false.'">';
           ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="add_faq">ADD FAQ's</button>
          </form>
        </div>
      
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModalfaqcode" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">FAQ's Code</h4>
        </div>
        <div class="modal-body">
      
          <textarea style="width:100%;height:100%;">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="tryit_121.htm#collapse2"><span class="fa fa-arrow-circle-down"></span>&nbsp;<i>QUESTION HERE !!!</i></a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body"><b>ANSWER HERE !!!</b></div>
      </div>
    </div>
          </textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<div id="msg_faq"></div>
      <div id="read"></div>
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
            window.location.href="../logout_admin.php";

          } 
          else {
            swal('Cancelled', 'Thanks for Staying :)', 'error');
          }
        });
      };

</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
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
