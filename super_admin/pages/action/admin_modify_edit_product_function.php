<?php 
include "connection/connection.php";

function edit_view_product(){
  GLOBAL $con;
  $id = $_SESSION['edit_id_product'];
  $sql = "SELECT * FROM product WHERE product_id='$id'";
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
                            
    echo'
         <form method="POST">                 
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Code</label>

                        <input type="text" class="form-control has-feedback-left"  id="field1" disabled>
                        
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Name</label>

                        <input type="text" class="form-control" id="inputSuccess3" name="p_name" value='.$p_name.' required>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Style</label>
                        <input type="text" class="form-control has-feedback-left" id="m_name" name="p_style" required value='.$p_style.'>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Price</label>
                        <input type="number" min="1" class="form-control" id="inputSuccess3" name="p_price" value="'.$p_price.'" required>
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Category</label>
                      <select id="heard" class="form-control" style="padding-left:50px;" name="p_category"  required>
                            <option>'.$p_cat.'</option>
                            <option value="Metal Screw">Metal Screw</option>
                            <option value="Cap Screw">Cap Screw</option>
                            <option value="Junction Screw">Junction Screw</option>
                            <option value="Wood Screw">Wood Screw</option>
                            <option value="Stove Bolt">Stove Bolt</option>
                            <option value="Stove Bolt">Nut</option>
                          </select>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Quantity</label>
                        <input type="number" min="1" class="form-control" id="inputSuccess4" name="p_quantity" required value='.$p_quantity.'>
                        <span class="glyphicon glyphicon-modal-window form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Per Stock</label>
                        <select id="heard" class="form-control" style="padding-left:50px;" name="p_pieces" required>
                            <option>'.$p_pieces.'</option>
                            <option value="164pcs/Stock">164pcs/Stock</option>
                            <option value="100pcs/Stock">100pcs/Stock</option>
                          </select>
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Product Color</label>
                        <select id="heard" class="form-control" name="p_color" required>
                            <option>'.$p_color.'</option>
                            <option value="Black">Black</option>
                            <option value="Bright Sink">Bright Sink</option>
                            <option value="Tetanize">Tetanize</option>
                          </select>
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>
                     <div class="col-md-12 col-sm-12 form-group has-feedback">
                        <label>Product Size</label>
                        <input type="text" class="form-control has-feedback-left" id="m_name" name="p_size" required value="'.$p_size.'">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      <form method="POST"> 
                          <input type="hidden" name="id" value="'.$pid.'">        
                          <center><button type="submit" class="btn btn-success" name="btn-update">Update</button></center>
                      </div>
                    </form>
    ';
  }if(isset($_POST['btn-update'])){
    $id = $_POST['id'];
 
    $p_name = $_POST['p_name'];
    $p_style = $_POST['p_style'];
    $p_cat = $_POST['p_category'];
    $p_color = $_POST['p_color'];
    $p_quantity = $_POST['p_quantity'];
    $p_pieces = $_POST['p_pieces'];
    $p_size = $_POST['p_size'];
    $p_price = $_POST['p_price'];

    $sql = "UPDATE product SET product_name = '$p_name', product_headstyle='$p_style'
            , product_cat1='$p_cat' , product_size = '$p_size', product_color='$p_color'
              , product_stocks='$p_quantity', product_pieces='$p_pieces'
                , product_price='$p_price' WHERE product_id = '$id'";
    $run_query = mysqli_query($con,$sql);
    if($run_query){
      echo"
          <script>
            setTimeout(function() {
        swal({
            title: 'Product Has Been Updated!!!',
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
