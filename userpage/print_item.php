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
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquerynew.min.js"></script>
    <script src="../js/jquery.min.js"></script>
	<script src="../mains.js"></script>
</head>
<style>
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}
table#t01 th {
    background-color: black;
    color: white;
}
</style>
<script>
function myFunction() {
    window.print();
}
</script>
<body>
	<br>
	<div id="msg_delete_receipt"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">PERSONAL INFORMATION</div>
					<div class="panel-body">
						<div id="msg_personal_info"></div>
						<!--<div class="row">
							<div class="col-md-3">
								<img src="../images/avatar3.png" style="width:70px;height:70px;">
							</div>
							
							<div class="col-md-6">
								Name:
								<br>
								Email-Address:
								<br>
								Phone #:
								<br>
								Tell No:
							</div>
						</div>-->
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
		</div>
	</div>
	<table>
  <tr>
    <th>ITEM NAME</th>
    <th>ITEM QUANTITY</th> 
    <th>ITEM COLOR</th>
    <th>ITEM SIZE</th>
    <th>ITEM STYLE</th>
    <th>ITEM PRICE</th>
    <th>ITEM TOTAL</th>
    <th>DATE</th>
  </tr>
  <tbody id="msg_print_item1"></tbody>
  <!--<tr>
  	
    <td>Jill</td>
    <td>Smith</td>
    <td>50</td>
  </tr>-->
</table>
<br>
<button class="btn btn-success btn-xs"onclick="myFunction()">Print My Receipt</button>

<a href="#" id="delete_receipt">Click Here If You are Done</a>
</body>
</html>
