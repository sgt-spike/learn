<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Edit A Blog Entry</title>
</head>
<body>
   <h1>Edit an Entry</h1>
   <?php // 12.8 - edit_entry.php
      /* This script edits a blog entry using an UPDATE query */
      //Connect and Select
      include 'connection.php';
      $dbc = mysqli_connect($host, $user, $pass, $data);

      //set the character set
      mysqli_set_charset($dbc, 'utf8');

      if ( isset($_GET['id']) && is_numeric($_GET['id']) ) {
         
         //define the query
         $query = "SELECT title, entry FROM entries WHERE entry_id = {$_GET['id']}";
         if ($r = mysqli_query($dbc, $query)) {
            $row = mysqli_fetch_array($r);

            //print form
            print '<form action="edit_entry.php" method="post">
                     <p>Enrty Title: <input type="text" name="title" size="40" maxsize="100" value="' . htmlentities($row['title']) . '"</p>
                     <p>Entry Text: <textarea name="entry" cols="40" rows="15">' . htmlentities($row['entry']) . '</textarea></p>
                     <input type="hidden" name="id" value="' . $_GET['id'] . '">
                     <input type="submit" name="submit" value="Update This Entry!">
                   </form>';
         } else {
            print '<p style="color:red;">Could not retrieve the blog entry because:<br>' . mysqli_error($dbc) . '</p>';
         }
      } elseif ( isset($_POST['id']) && is_numeric($_POST['id']) ) {
         
         $problem = false;
         if ( !empty($_POST['title']) && !empty($_POST['entry']) ) {
            $title = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['title'])));
            $entry = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['entry'])));
         } else {
            print '<p style="color:red;">Please submit both a title and an entry.</p>';
            $problem = true;
         }

         if (!$problem) {
            //define the query
            $query = "UPDATE entries SET title = '$title', entry = '$entry' WHERE entry_id = {$_POST['id']}";
            $r = mysqli_query($dbc, $query);

            //report the results
            if (mysqli_affected_rows($dbc) == 1) {
               print '<p>The blog entry has been updated</p>';
            } else {
               print '<p style="color:red;">Could not update the entry because: <br>' . mysqli_error($dbc) . '</p>';
            }
         }
      } else {
         print '<p style="color:red;">This page has been accessed in error.</p>';
      }

      mysqli_close($dbc);
   ?>
</body>
</html>