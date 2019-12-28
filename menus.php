<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Date Menus</title>
</head>
<body>
   <?php 
      function make_date_menus($start_year, $total_years = 10) {

         // Create an array of the months
         $months = [1 => 'January', 'Februaray', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

          // Make the month pull-down menu
         print '<select name="month" id="month">';
         foreach ($months as $key => $value) {
            print "\n<option value=\"$key\">$value</option>";
         }//end of foreach loop
         print '</select>';

            //Make the day pull down menu
         print '<select name="day">';
         for ($day = 1; $day <= 31; $day++) {
            print "\n<option value=\"$day\">$day</option>";
         }//end of for loop
         print '</select>';

         print '<select name="year" id="year">';
         //$start_year = date('Y');
         for ($y = $start_year; $y <= ($start_year + $total_years); $y++) {
            print "\n<option value=\"$y\">$y</option>";
         }
         print '</select>';
      }

      print '<form action="" method="post">';
            make_date_menus(2015, 15);
      print '</form>';
   ?>
</body>
</html>