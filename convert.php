<?php

$str = "Hello";
//echo md5($str);

 $enc = base64_encode($str);
 echo base64_decode($enc);


 ?>