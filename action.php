<?php 
include "connection.php";

if(isset($_POST['category1'])){
	$category1_query = "SELECT * FROM category_1 INNER JOIN category_2";
	$run_query = mysqli_query($con,$category1_query);
	echo "
	<li class='dropdown'>
            <a href='#' class='dropbtn'>

              <span><i class='fa fa-envelope'></i></span>
              <span>Products</span>

            </a>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid1 = $row['cat1_id'];
			$cat1_name = $row['cat1_name'];
			$cid2 = $row['cat2_id'];
			$cat2_name = $row['cat2_name'];
			
 			echo "
 			<ul>
 				<li class='dropdown-content' style='width:180px;'>
               <a href='tryit_183.htm#''>$cat1_name</a>
               <a href='tryit_183.htm#''>$cat2_name</a>
               
               </li>
               </ul>
 			";
		}
		echo"</li>";
	}
}

?>
