<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Create a Table</title>
</head>
<body>
   <?php //script 12.3 - create_table.php
      /* This script connects to the MySQL server, Selects the database, and creates a table */
      include 'conn_db.php';
      // Connect and select:
      if ($dbc = @mysqli_connect($host, $user, $pass, $data)) {
         //Define the query
         $query = 'CREATE TABLE entries (
                     entry_id INT AUTO_INCREMENT PRIMARY KEY,
                     title varchar(100) NOT NULL,
                     entry TEXT NOT NULL,
                     date_entered DATETIME NOT NULL)';
         if (@mysqli_query($dbc, $query)) {
            print '<p>The table has been created!</p>';
         } else {
            print '<p style="color:red;">Could not create the table because:<br>' . mysqli_error($dbc) . '</p>';
         }

         mysqli_close($dbc);
      } else {
         print '<p style="color:red;">Could not connect to the database:<br>' . mysqli_connect_error() . '</p>';
      }
   ?>
</body>
</html>