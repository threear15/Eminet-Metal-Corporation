<?php
session_start();
if(!isset($_SESSION['uid'])){
  header("location:../index.php");
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
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> 
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

<script type="text/javascript" src="../js/js/jquery-1.11.2.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="../js/jquerynew.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script scrc="../js/bootstrap.min.js"></script>

    <script src="../mains.js"></script>


    

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
              <span style="color:white;"><?php echo "".$_SESSION['name'];?></span>
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
            <a href="../index.php">
              <span><i class="fa fa-home"></i></span>
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
            <a href="cart_pending.php" id="cart_container">
              <span><i class="fa fa-shopping-cart"></i></span>
              <span>Cart&nbsp;<span class="badge" id="badge2">0</span></span>
            </a>
          </li>
          <li>
            <input type="hidden" id="print_me" class="form-control" value="<?php echo $_SESSION['uid'];?>">
            <a href="#" id="print_receipt">
              <span><i class="fa fa-print"></i></span>
              <span>Print Receipt</span>
            </a>
          </li>
          <li>
            <a href="#" class="sweet-5" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-5']);" id="logout_me">
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

         <div id="slide">
          
       <div class="row">
        <div class="col-md-12">
          <div class="panel-group" id="accordion">
            <div id="get_faq_msg1"></div>
    <!--<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="tryit_121.htm#collapse1">Pwede Ba Mag Refund?</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">Hindi Pwede Baka kasi malugi kami. Kung bibili ka Siguraduhin mo na. Wala ng bawian. TIME!</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="tryit_121.htm#collapse2">Nagbibigay ba kayo ng warranty?</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Oo nagbibigay kami ng warranty kung ka close kita :P. Charot
          Di po kami nagbibigay ng warranty! Time!</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="tryit_121.htm#collapse3">Paano kung may sirang product yung dinilivered ninyo, mapalitan ba agad yun?</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
          Dadaan po muna sa masusing pag-aaral yan. Pag napatunayan ng produkto namin yan at napatunayan ng mayroong gasgas o sira ang produkto na dinilivered namin. Agad po namin iyang papalitan. May kasama pang kiss kay Three Ar :*. Time!
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="tryit_121.htm#collapse4">Paano kung Na flatan o naabutan o bagyo o nabangga wag naman sana... yung sasakyan na gamit niyo pang delivered, anong aksyon ang gagawin ninyo?</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
          Agad po kayong kokontakin ng kompanya namin at bibigyan ng abiso ng madedelay yung podukto na inorder ninyo dahil sa kadahilanang hindi malamang dahilan. At nasa pag uusap na po ng kompanya at kostumer ang agreement. Time!
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="tryit_121.htm#collapse5">Puwede ko bang i-kansel yung inorder kong produkto?</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">
          Puwede niyo pong I-kansel yung produkto na inorder ninyo. Pero di na ma re-refund yung pera ninyo :P.Kaya kung ako sayo wag mo na ipa-kansel. kasi sayang. Time!
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="tryit_121.htm#collapse6">Ilan ang minimum price ng puwede naming ma-avail sa pag order ng products?</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">
          &#8369;3,000.00
        </div>
      </div>
    </div>-->
  </div>
                       </div>
   
       </div>
               </div>
    <div id="msg_print_receipt"></div>
   <div id="msgadd"></div>
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
            window.location.href="../logout.php";

          } 
          else {
            swal('Cancelled', 'Thanks for Staying :)', 'error');
          }
        });
      };
</script>

  
  
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