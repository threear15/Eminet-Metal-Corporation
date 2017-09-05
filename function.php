	<?php

	function view(){
		include "connection.php";
		GLOBAL $con;

		$open =mysqli_query($con,"SELECT * FROM user WHERE id=".$_SESSION['uid']);
		while ($row = mysqli_fetch_assoc($open)) {
			$pass = $row['password'];
			echo "<tr>
				<td>$pass</td>
				
			</tr>";	
		}
	}
	?>