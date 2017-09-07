<html>
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Eminent Metal Corporation</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/owl.theme.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/owl.transitions.min.css" rel="stylesheet">
  <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" type="text/css" href="pic.css">


        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="js/jquery.min.js"></script>
        <script scrc="js/bootstrap.min.js"></script>
        <script src="main.js"></script>
</head>
<body>
<html>
    <head></head>
    <body>
        Original Field to show user input: <input type="text" name="mobile_number" id="mobile_number" maxlength="11"><br>
        Hidden field to get the user input server side : <input type="text" name="mobile_number_hidden" id="mobile_number_hidden">
    </body>
    <script>
    jQuery("#mobile_number").keyup(function(e){
        var mobile_number = jQuery(this).val();
        var star = "";
        if(mobile_number.length <= 8)
        {
            var mobile_number_hidden = jQuery("#mobile_number_hidden").val();
            var star_mobile_number = replaceSubstring(mobile_number,"*","");
            mobile_number_hidden = mobile_number_hidden+star_mobile_number;
            mobile_number_hidden = replaceSubstring(mobile_number_hidden,"*","");
            jQuery("#mobile_number_hidden").val(mobile_number_hidden);
            for(var i = 1; i <= mobile_number.length; i++)
            {
                star = star+"*";
            }
            jQuery("#mobile_number").val(star);
        }     
        else if(mobile_number.length > 8 && mobile_number.length <= 11)
        {
            var mobile_number_hidden = jQuery("#mobile_number_hidden").val();
            var new_mobile_number = "";
            for(var loop1=0; loop1 < 8; loop1++)
            {
                new_mobile_number = new_mobile_number+mobile_number_hidden.charAt(loop1);
            }
            for(var loop2=8; loop2 < mobile_number.length; loop2++)
            {
                new_mobile_number = new_mobile_number+mobile_number.charAt(loop2);
            }
            mobile_number_hidden = replaceSubstring(new_mobile_number,"*","");
            jQuery("#mobile_number_hidden").val(mobile_number_hidden);    
        }
    });


function replaceSubstring(inSource, inToReplace, inReplaceWith) {

  var outString = inSource;
  while (true) {
    var idx = outString.indexOf(inToReplace);
    if (idx == -1) {
      break;
    }
    outString = outString.substring(0, idx) + inReplaceWith +
      outString.substring(idx + inToReplace.length);
  }
  return outString;

}
    </script>
</div>
</body>
</html>