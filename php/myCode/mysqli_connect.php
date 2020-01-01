<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Connect to MySQL</title>
</head>
<body>
   <?php //Script 12.1 - myslqi_connect.php

      /* This script connects to the MySQL database */
      include 'connection.php';
      if ($dbc = @mysqli_connect($host, $user, $pass, $data)) {
         print '<p>Successfully connected to the database!</p>';
         mysqli_close($dbc);
      } else {
         print '<p style="color:red;">Could not connect to the database:<br>' . mysqli_connect_error() . '</p>';
      }

   ?>
</body>
</html>