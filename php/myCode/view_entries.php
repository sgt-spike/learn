<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>View My Blog</title>
</head>
<body>
   <h1>My Blog</h1>
   <?php // Script 12.6 - view_entries.php
      /* This script retrieves blog entriesfrom the database */
      
      //connect and select
      include 'connection.php';
      $dbc = mysqli_connect($host, $user, $pass, $data);

      //define the query
      $query = 'SELECT * FROM entries ORDER BY date_entered DESC';
      
      if ($r = mysqli_query($dbc, $query)) {

         while ($row = mysqli_fetch_array($r)) {
            print "<p><h3>{$row['title']}</h3>{$row['entry']}<br>
                  <a href=\"edit_entry.php?id={$row['entry_id']}\">Edit</a>
                  <a href=\"delete_entry.php?id={$row['entry_id']}\">Delete</a>
                  </p><hr>\n";
         }
      } else {
         print '<p style="color:red;">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '</p>';
      }
      mysqli_close($dbc);
   ?>
</body>
</html>