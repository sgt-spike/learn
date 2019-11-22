<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>My Little Grade Book</title>
</head>
<body>
   <?php //Script 7.5 - sort.php
      $grades = [
         'Richard' => 95,
         'Sherwood' => 82,
         'Toni' => 98,
         'Franz' => 87,
         'Melissa' => 75,
         'Roddy' => 85
      ];

      print "<p>Originally the arry looks like this: <br>";

      foreach ($grades as $student => $grade) {
         print "$student: $grade <br>\n";
      }
      print "</p>";
      asort($grades);

      print "<p>After sorting the array by using asort(), the array looks like this: <br>";
      foreach ($grades as $student => $grade) {
         print "$student: $grade<br>\n";
      }
      print "</p>";

      ksort($grades);

      print "<p>After sorting the array by using ksort(), the array looks like this: <br>";
      foreach ($grades as $student => $grade) {
         print "$student: $grade<br>\n";
      }
      print "</p>";
   ?>
</body>
</html>