<?php   
session_start();
if(!isset($_SESSION['admin_id'])){
  header("location:login.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "link_api.php"; 
    ?>
    <?php 
require_once('bdd.php');


$sql = "SELECT id, title, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();
     ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-diamond"></i> <span>EMINENT</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo $_SESSION['image']; ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['f_name']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a> </li>
                  <li><a href="delivery.php"><i class="fa fa-truck"></i> Delivery Schedule</a> </li>
                 <li><a><i class="fa fa-dollar"></i> Payment Received <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a href="payment_received.php"> Paypal</a></li>
                      <li><a href="cheque.php"> Cheque</a></li>
                      <li><a href="palawan_express.php"> Palawan Express</a></li>
                      <li><a href="cod.php"> Cash On Delivery</a></li>
                  </ul>
                  </li>
                  <li><a><i class="fa fa-calendar"></i> Sales Income <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a href="sales-month.php">Sales in a Month</a></li>
                      <li><a href="sales-year.php">Sales in a Year</a></li>
                  </ul>
                  </li>
                  <li><a><i class="fa fa-group"></i> Modify Accounts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="customer_modify.php">Edit Customers</a></li>
                      <li><a href="admin_modify.php">Edit Admin</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#modal_admin">Add Admin</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#modal_customer">Add Customers</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-tasks"></i> Modify Products <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="edit-product.php">Edit Products</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#modal_product">Add Products</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Modify System <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="edit-home.php">Edit Home</a></li>
                      <li><a href="edit-aboutus.php">Edit About Us</a></li>
                      <li><a href="edit-faq.php">Edit FAQ's</a></li>
                      <li><a href="ad-faq.php">Add FAQ's</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-recycle"></i> Archived System <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="archived-super-admin.php">Super Admin</a></li>
                      <li><a href="archived-admin.php">Admin</a></li>
                      <li><a href="archived-product.php">Products</a></li>
                    </ul>
                  </li>
                  <li><a href="change-password.php"><i class="fa fa-home"></i> Change Password</a> </li>   
                  <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li> 
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>
   <div id="add_customer_msg"></div>
   <div id="add_admin_msg"></div>
   <div id="add_product_msg"></div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $_SESSION['image']; ?>" alt=""><?php echo $_SESSION['f_name']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-red">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Customers</span>
              <div class="count purple" id="total_customers">0</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user-md"></i> Total Admin</span>
              <div class="count" id="total_admin">0</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user-md"></i> Total Super Admin</span>
              <div class="count" id="total_superadmin">0</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Male Customers</span>
              <div class="count green" id="total_customers_males">0</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Female Customers</span>
              <div class="count red" id="total_customers_females">0</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Products</span>
              <div class="count" id="total_products">0</div>
            </div>
            
          </div>
          <!-- /top tiles -->

        <!-- delevery 101-->
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="example1" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Role</th>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Last Name</th>
                          <th>Age</th>
                          <th>Gender</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                        include "connection/connection.php";
                          $sql = "SELECT * FROM super_admin";
                          $run_query = mysqli_query($con,$sql);
                          while($row = mysqli_fetch_array($run_query)){
                            $id = $row['id'];
                            $role = $row['role'];
                            $f_name = $row['f_name'];
                            $m_name = $row['m_name'];
                            $l_name = $row['l_name'];
                            $age = $row['age'];
                            $gender = $row['gender'];

                            echo"
                            <tr>
                          <td>$role</td>
                          <td>$f_name</td>
                          <td>$m_name</td>
                          <td>$l_name</td>
                          <td>$age</td>
                          <td>$gender</td>
                          <td>
                          <form method='POST'>
                          <input type='hidden' name='id' value='".$id."'>
                          <button class='btn btn-success btn-xs' name='btn-edit'>Edit</button>
                          <button class='btn btn-warning btn-xs' name='btn-password'>New Password</button>
                          <button class='btn btn-danger btn-xs' name='btn-delete'>Delete</button>
                          </td>
                          </form>
                        </tr>
                            ";
                          }
                         ?>
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="modal_edit_password_admin" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <a href="admin_modify.php" style="font-size:20px;font-weight:bold;float:right;">&times;</a>
          
                    <br />
                    <?php 
                      include "action/admin_modify_password_function.php";
                      view_password_admin();
                     ?>
                  </div>        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
          <div class="row">

  <!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="modal_customer" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Customer's Registration Form</h4>
        </div>
        <div class="modal-body">
          <div class="x_content">
                    <br />
                    <form method="POST" class="form-horizontal form-label-left input_mask">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="f_name" name="f_name1" placeholder="First Name">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess3" placeholder="Last Name" name="l_name1">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="m_name" name="m_name1" placeholder="Middle Name" >
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess3" placeholder="Age" name="age1">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <select id="heard" class="form-control" style="padding-left:50px;" name="gender1">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess4" placeholder="Telephone Number" name="tel1">
                        <span class="glyphicon glyphicon-modal-window form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" name="email1">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess5" placeholder="Phone Ex: 9123456789" name="phone1">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-6 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Home Address" name="h_address1">
                        <span class="glyphicon glyphicon-globe form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="City" name="city1">
                        <span class="glyphicon glyphicon-globe form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Barangay" name="brgy1">
                        <span class="glyphicon glyphicon-globe form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <select id="heard" class="form-control" style="padding-left:50px;" name="status1">
                            <option value="Approved">Approved</option>
                            <option value="Pending">Pending</option>
                          </select>
                        <span class="fa fa-user-md form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="password" class="form-control" id="inputSuccess5" placeholder="Password" name="password1">
                        <span class="fa fa-eye-slash form-control-feedback right" aria-hidden="true"></span>

                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">         
                          <center><button type="submit" class="btn btn-success" id="add_customer">Add Customer</button></center>
                      </div>

                    </form>
                  </div>        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="modal_product" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Product</h4>
        </div>
        <div class="modal-body">
          <div class="x_content">
                    <br />
                    <form name="data" method="POST"  class="form-horizontal form-label-left input_mask"  enctype="multipart/form-data">
                      
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Code</label>

                        <input type="text" class="form-control has-feedback-left"  id="field1" disabled>
                        <input type="hidden" class="form-control has-feedback-left"  id="field2" name="p_code">
                        
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Name</label>

                        <input type="text" class="form-control" id="inputSuccess3" name="p_name" required>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Style</label>
                        <input type="text" class="form-control has-feedback-left" id="m_name" name="p_style" required>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Price</label>
                        <input type="text" class="form-control" id="inputSuccess3" name="p_price" required>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Category</label>
                      <select id="heard" class="form-control" style="padding-left:50px;" name="p_category" required>
                            <option value="Metal Screw">Metal Screw</option>
                            <option value="Cap Screw">Cap Screw</option>
                            <option value="Junction Screw">Junction Screw</option>
                            <option value="Wood Screw">Wood Screw</option>
                            <option value="Stove Bolt">Stove Bolt</option>
                          </select>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Quantity</label>
                        <input type="text" class="form-control" id="inputSuccess4" name="p_quantity" required>
                        <span class="glyphicon glyphicon-modal-window form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Per Stock</label>
                        <select id="heard" class="form-control" style="padding-left:50px;" name="p_stocks" required>
                            <option value="164pcs/Stock">164pcs/Stock</option>
                            <option value="100pcs/Stock">100pcs/Stock</option>
                          </select>
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Color</label>
                        <select id="heard" class="form-control" name="p_color" required>
                            <option value="Black">Black</option>
                            <option value="Bright Sink">Bright Sink</option>
                            <option value="Tetanize">Tetanize</option>
                          </select>
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>
                     <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Size</label>
                        <input type="text" class="form-control has-feedback-left" id="m_name" name="p_size" required>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Image</label>
                        <input type="file" name="image" id='image' class="form-control has-feedback-right" required>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">         
                          <center><button type="submit" class="btn btn-success" name="add_product">Add Product</button></center>
                      </div>
                      <?php 
                            include "action/product_reg.php";
                      add_product();
                       ?>
                    </form>
                  </div>        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  <div class="modal fade" id="modal_admin" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Admin's Registration Form</h4>
        </div>
        <div class="modal-body">
          <div class="x_content">
                    <br />
                    <form method="POST" class="form-horizontal form-label-left input_mask">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="f_name" name="f_name" placeholder="First Name">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess3" placeholder="Last Name" name="l_name">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="m_name" name="m_name" placeholder="Middle Name" >
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess3" placeholder="Age" name="age">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <select id="heard" class="form-control" style="padding-left:50px;" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <select id="heard" class="form-control" name="role">
                            <option value="Admin">Admin</option>
                            <option value="Super Admin">Super Admin</option>
                          </select>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="User Name" name="username">
                        <span class="fa fa-user-md form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="password" class="form-control" id="inputSuccess5" placeholder="Password" name="password">
                        <span class="fa fa-eye-slash form-control-feedback right" aria-hidden="true"></span>

                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <input type="hidden" name="image_ko" value="empty">          
                          <center><button type="submit" class="btn btn-success" id="add_admin">Add Admin</button></center>
                      </div>

                    </form>
                  </div>        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
  
  
            <div class="col-md-4 col-sm-4 col-xs-12">
              
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
             
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
              
            </div>

          </div>


          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
             
            </div>


            <div class="col-md-8 col-sm-8 col-xs-12">



              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  
                </div>

              </div>
              <div class="row">


                <!-- Start to do list -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                  
                </div>
                <!-- End to do list -->
                
                <!-- start of weather widget -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                  

                </div>
                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Eminent Metal Corporation
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#modal_edit_password_admin').modal('show');
    });
</script>
<?php
  include "script_api.php";
 ?>

  </body>
  
</html>

