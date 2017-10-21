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
                  <li><a href="#" data-toggle="modal" data-target="#modal_password"><i class="fa fa-home"></i> Change Password</a> </li>
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
                  <a href="messages.php" class="dropdown-toggle info-number" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-red">0</span>
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
                          <th>P_Image</th>
                          <th>P_Code</th>
                          <th>P_Name</th>
                          <th>P_Price</th>
                          <th>P_Quantity</th>
                          <th>P_Size</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                        include "connection/connection.php";
                          $sql = "SELECT * FROM product";
                          $run_query = mysqli_query($con,$sql);
                          while($row = mysqli_fetch_array($run_query)){
                            $pid = $row['product_id'];
                            $p_code = $row['product_code'];
                            $p_cat = $row['product_cat1'];
                            $p_name = $row['product_name'];
                            $p_style = $row['product_headstyle'];
                            $p_pieces = $row['product_pieces'];
                            $p_color = $row['product_color'];
                            $p_size = $row['product_size'];
                            $p_price = $row['product_price'];
                            $p_image = $row['product_image'];
                            $p_quantity = $row['product_stocks'];

                            echo"
                            <tr>
                          <td><center><img src='$p_image' style='width:150px;height:100px;'></td>
                          <td>$p_code</td>
                          <td>$p_name</td>
                          <td>&#8369; $p_price.00</td>
                          <td>$p_quantity</td>
                          <td>$p_size</td>
                          <td>
                          <form method='POST'>
                          <input type='hidden' name='id' value='$pid'>
                          <input type='hidden' name='p_cat' value='$p_cat'>
                          <input type='hidden' name='p_name' value='$p_name'>
                          <input type='hidden' name='p_code' value='$p_code'>
                          <input type='hidden' name='p_style' value='$p_style'>
                          <input type='hidden' name='p_pieces' value='$p_pieces'>
                          <input type='hidden' name='p_color' value='$p_color'>
                          <input type='hidden' name='p_size' value='$p_size'>
                          <input type='hidden' name='p_price' value='$p_price'>
                          <input type='hidden' name='p_image' value='$p_image'>
                          <input type='hidden' name='p_quantity' value='$p_quantity'>
                          <button class='btn btn-success btn-xs' name='btn-edit'>Edit</button>
                          <button class='btn btn-danger btn-xs' name='btn-delete'>Delete</button>
                          </td>
                          </form>
                        </tr>
                            ";
                          }if(isset($_POST['btn-edit'])){
                            $id = $_POST['id'];
                            $_SESSION['edit_id_product'] = $id;
                            echo"
                            <script>window.location.href='edit-product-modal.php'</script>
                            ";
                          }if(isset($_POST['btn-delete'])){
                            $id = $_POST['id'];
                            $_SESSION['delete_id'] = $id;
                            $p_cat = $_POST['p_cat'];
                            $p_name = $_POST['p_name'];
                            $p_code = $_POST['p_code'];
                            $p_style = $_POST['p_style'];
                            $p_pieces = $_POST['p_pieces'];
                            $p_color = $_POST['p_color'];
                            $p_size = $_POST['p_size'];
                            $p_price = $_POST['p_price'];
                            $p_image = $_POST['p_image'];
                            $p_quantity = $_POST['p_quantity'];

                            $sql = "INSERT INTO `archived_product` (`id`, `product_id`, `product_code`, `product_cat1`, `product_name`, `product_headstyle`, `product_pieces`, `product_color`, `product_price`, `product_size`, `product_image`, `product_stocks`) 
                                    VALUES (NULL, '$id', '$p_code', '$p_cat', '$p_name', '$p_style', '$p_pieces', '$p_color',
                                                 '$p_price', '$p_size', '$p_image', '$p_quantity')";
                            $run_query = mysqli_query($con,$sql);
                            if($run_query){

                              $sql = "DELETE FROM product WHERE product_id = '$id'";
                              $run_query = mysqli_query($con,$sql);
                              if($run_query){
                                echo"
                                  <script>
                                    setTimeout(function() {
                                swal({
                                    title: 'Product Has Been Deleted',
                                    text: '',
                                    type: 'success'
                                }, function() {
                                    window.location = 'edit-product.php';
                                });
                            }, 1);
                              </script>
                                ";
                              }
                            }

                          }
                          
                         ?>
                        
                        
                      </tbody>
                    </table>
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
                        <input type="number" min='1' class="form-control" id="inputSuccess3" name="p_price" required>
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
                        <input type="number" min='1' class="form-control" id="inputSuccess4" name="p_quantity" required>
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
    <div class="modal fade" id="modal_password" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">My Password</h4>
        </div>
        <div class="modal-body">
          <div class="x_content">
                    <br />
                    
                    <?php 
                    include "connection/connection.php";
                    GLOBAL $con;
                      $sql = "SELECT * FROM super_admin WHERE id=".$_SESSION['admin_id'];
                      $run_query = mysqli_query($con,$sql);
                      while($row = mysqli_fetch_array($run_query)){
                        echo'
                          <form method="POST" class="form-horizontal form-label-left input_mask">
                          <div class="col-md-12 col-sm-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" value="'.$row['password'].'" disabled>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-12 col-sm-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess3" placeholder="New Password" name="n_pass">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <input type="hidden" name="id" value="'.$row['id'].'">
                        <input type="hidden" name="password" value="'.$row['password'].'">      
                          <center><button type="submit" class="btn btn-success" name="btn-update123">Change Password</button></center>
                      </div>

                    </form>
                        ';
                      }if(isset($_POST['btn-update123'])){
                        $id = $_POST['id'];
                        $n_pass = mysqli_real_escape_string($con,$_POST['n_pass']);

                        $hash = $n_pass;
                        $password_hash = password_hash($hash, PASSWORD_DEFAULT);
                        $sql = "UPDATE super_admin SET password = '$password_hash' 
                                WHERE id='$id'";
                        $run_query = mysqli_query($con,$sql);
                        if($run_query){



                        $password_verify = $password_hash;

                      $sql = "SELECT * FROM super_admin WHERE password = '$password_verify' AND id =".$_SESSION['admin_id'];
                      $run_query = mysqli_query($con,$sql);
                      $row = mysqli_fetch_array($run_query);
                          $id = $row['id'];
                          $role = $row['role'];
                          $_SESSION['admin_id'] = $row['id'];
                          $_SESSION['f_name'] = $row['f_name'];
                          $_SESSION['m_name'] = $row['m_name'];
                          $_SESSION['l_name'] = $row['l_name'];
                          $_SESSION['image'] = $row['image'];
                          $_SESSION['username'] = $row['username'];
                          $_SESSION['password'] = $row['password'];

                          if(password_verify($password_verify, $row['password'])){
                          }else{
                            echo "<script>
      
        
                          setTimeout(function() {
                          swal({
                              title: 'Password Changed',
                              text: '',
                              type: 'success',
                          }, function() {
                              window.location = 'index.php';
                          });
                      }, 1);
                        </script>";
                          }
  } 

                        }

                      
                     ?>
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

<?php
  include "script_api.php";
 ?>

  </body>
</html>
