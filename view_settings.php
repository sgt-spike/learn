<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>View Your Settings</title>
   <style>
      body {
         <?php 
            //If the cookie is set, set the font size based on the font_size index in $_COOKIE
            if (isset($_COOKIE['font_size'])) {
               print "font-size: " . htmlentities($_COOKIE['font_size']) . ";\n";
            } else {
               print "\t\tfont-size: medium;";
            }

            //If the cookie is set, set the font color based on the font_color index in $_COOKIE
            if (isset($_COOKIE['font_color'])) {
               print "\t\tcolor: #" . htmlentities($_COOKIE['font_color']) . ";\n";
            } else {
               print "\t\tfont-color: #000;";
            }
         ?>
      }
   </style>
</head>
<body>
   <p><a href="customize.php">Customize Your Settings</a></p>
   <p><a href="reset.php">Reset Your Settings</a></p>
   <p>yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda</p>
</body>
</html>