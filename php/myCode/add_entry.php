<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Add a Blog Entry</title>
</head>
<body>
   <h1>Add a Blog Enter</h1>
   <?php // Script 12.4 - add_entry.php
      /* This script adds a blog entry to the database */

      include 'connection.php';

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         //create db connection
         $dbc = mysqli_connect($host, $user, $pass, $data);
         mysqli_set_charset($dbc, 'utf8');

         // Validate the form data:
         $problem = false;
         if (!empty($_POST['title']) && !empty($_POST['entry'])) {
            $title = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['title'])));
            $entry = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['entry'])));
         } else {
            print '<p style="color:red;">Please submit both title and an entry.</p>';
            $problem = true;
         }

         if (!$problem) {
            
            //define query
            $query = "INSERT INTO entries (entry_id, title, entry, date_entered) VALUES (0, '$title', '$entry', NOW())";

            //Execute the query:
            if (@mysqli_query($dbc, $query)) {
               print '<p>The blog entry has been added!</p>';
            } else {
               print '<p style="color:red;">Could not add the entry because:<br>' . mysqli_error($dbc) . '</p>';
            }
         }
         mysqli_close($dbc);
      }
   ?>
   <form action="add_entry.php" method="post">
      <p>Entry Title: <input type="text" name="title" size="40" maxsize ="100"></p>
      <p>Entry Text: <textarea name="entry" id="entry" cols="40" rows="15"></textarea></p>
      <input type="submit" name="submit" value="Post This Entry!"></input>
   </form>
</body>
</html>