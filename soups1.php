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

      $count1 = count($soups);
      print "<p>The soup array originally had $count1 elements.</p>";

      
      $count2 = count($soups);
      print "<p>After adding 3 more soups, the array now has $count2 elements.</p>";

      print "<p>Monday's soup is {$soups['Monday']}.</p>";
   ?>
</body>
</html>