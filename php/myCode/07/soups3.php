<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>No Soup for You!</title>
</head>
<body>
   <h1>Mmm...Soups</h1>
   <?php //script 7.1 - soups1.php
      ini_set('display_errors', 1);
      error_reporting(E_ALL);
      
      $soups = [
         'Monday' => 'Clam Chowder',
         'Tuesday' => 'White Chicken Chili',
         'Wednesday' => 'Vegetarian',
         'Thursday' => 'Chicken Noodle',
         'Friday' => 'Tomato',
         'Saturday' => 'Cream of Broccoli'
      ];

      print "<p>Available Soups</p><br>";
      foreach ($soups as $soup) {
         print "$soup <br>";
      }

      foreach ($soups as $day => $soup) {
         print "<p>$day: $soup</p>\n";
      }
   ?>
</body>
</html>