<?php
session_start();
if(!isset($_SESSION['uid'])){
  header("location:../index.php");
}
?>
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
	<br>
  <div style="color:red;padding-left:70px;"><i>*Please Input Right and Legit Details, before
    you print and send your receipt...</i><a href="cart_pending.php" style="float:right;padding-right:60px;">Continue Shopping...</a></div>
<div class="container"> 
  <table class="table-bordered">
    <tr>
      <thead>
      <th><img src="../images/companyname.png" style="height:50px;width:200px;"></th>
      <th style="padding-right:369px;">Payment Method: Cash On Delivery</th>
      <th>&nbsp;eminentmetalcorporation@gmail.com&nbsp;</th>
    </thead>
    </tr>
  </table>
  <table class="table-bordered">
   <tr>
      <thead>
      <th style="width:400px;">Fullname</th>
      <th style="width:400px;">Phone</th>
      <th style="width:400px;">Telephone</th>
      <th style="width:420px;">Gmail</th>
    </thead>
    </tr>
    <tr>
      <tbody>
        <td><input type="text" class="form-control"></td>
        <td><input type="text" class="form-control"></td>
        <td><input type="text" class="form-control"></td>
        <td><input type="text" class="form-control"></td>
      </tbody>
    </tr>
    <tr>
      <thead>
        <th colspan="4">Address</th>
      </thead>
    </tr>
    <tr>
      <tbody>
        <td colspan="4"><input type="text" class="form-control"></td>
      </tbody>
    </tr>
  </table>
  <table class="table-bordered">
    <tr>
      <thead>
        <th style="width:400px;">Product Name</th>
        <th style="width:400px;">Product Color</th>
        <th style="width:400px;">Product Size</th>
        <th style="width:400px;">Product Price</th>
        <th style="width:400px;">Product Quantity</th>
      </thead>
    </tr>
    <?php 
    include "function.php";
    get_cart_cod();
    ?>
  </table>
</div>
<div style="padding-left:80px;padding-top:10px;">
  <button class="btn btn-success btn-xs" onclick="myFunction()">Print My Receipt</button>
</div>
<div style="padding-left:80px;padding-top:10px;">
  <form method="POST" enctype='multipart/form-data'>
  <input type="file" name="image" id="image" required>
  <br>
  <button name="send-receipt" class="btn btn-success">SEND<span class="glyphicon glyphicon-send"></span></button>
  <?php 
  get_receipt_cod();
   ?>
</form>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
</body>
</html>