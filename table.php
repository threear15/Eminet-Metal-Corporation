<?php
// Set your timezone!!
date_default_timezone_set('Asia/Tokyo');
 
// Get prev & next month
if (isset($_GET['ym'])) {
  $ym = $_GET['ym'];
} else {
  // This month
  $ym = date('Y-m');
}
 
// Check format
$timestamp = strtotime($ym."-01");
if ($timestamp === false) {
  $timestamp = time();
}
 
// Today
$today = date('Y-m-j', time());
 
// For H3 title
$html_title = date('Y / m', $timestamp);
 
// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
 
// Number of days in the month
$day_count = date('t', $timestamp);
 
// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
 
 
// Create Calendar!!
$weeks = array();
$week = '';
 
// Add empty cell
$week .= str_repeat('
<td></td>

', $str);
 
for ( $day = 1; $day <= $day_count; $day++, $str++) {
  
  $date = $ym.'-'.$day;
  
  if ($today == $date) {
    $week .= '
<td class="today">
'.$day;
  } else {
    $week .= '
<td>'.$day;
  }
  $week .= '</td>

';
  
  // End of the week OR End of the month
  if ($str % 7 == 6 || $day == $day_count) {
    
    if($day == $day_count) {
      // Add empty cell
      $week .= str_repeat('
<td></td>

', 6 - ($str % 7));
    }
    
    $weeks[] = '
<tr>'.$week.'</tr>

';
    
    // Prepare for new week
    $week = '';
    
  }
 
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PHP Calendar</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
  
<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cstyle%3E%0A%09%09.container%20%7B%0A%09%09%09font-family%3A%20'Noto%20Sans'%2C%20sans-serif%3B%0A%09%09%09margin-top%3A%2080px%3B%0A%09%09%7D%0A%09%09th%20%7B%0A%09%09%09height%3A%2030px%3B%0A%09%09%09text-align%3A%20center%3B%0A%09%09%09font-weight%3A%20700%3B%0A%09%09%7D%0A%09%09td%20%7B%0A%09%09%09height%3A%20100px%3B%0A%09%09%7D%0A%09%09.today%20%7B%0A%09%09%09background%3A%20orange%3B%0A%09%09%7D%0A%09%09th%3Anth-of-type(7)%2Ctd%3Anth-of-type(7)%20%7B%0A%09%09%09color%3A%20blue%3B%0A%09%09%7D%0A%09%09th%3Anth-of-type(1)%2Ctd%3Anth-of-type(1)%20%7B%0A%09%09%09color%3A%20red%3B%0A%09%09%7D%0A%09%3C%2Fstyle%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;style&gt;" title="&lt;style&gt;" />

  
</head>
<body>
  
<div class="container">

<h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>

    
    
<table class="table table-bordered">
      
<tr>
        
<th>S</th>


<th>M</th>


<th>T</th>


<th>W</th>


<th>T</th>


<th>F</th>


<th>S</th>

      </tr>

      <?php foreach ($weeks as $week) { echo $week; } ?>
    </table>

  </div>

</body>
</html>