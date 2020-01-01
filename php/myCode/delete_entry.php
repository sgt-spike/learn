<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Delete a Blog Entry</title>
</head>
<body>
   <h1>Delete an Entry</h1>
   <?php // Script 12.7 - delete_entry.pgp
      /* This script deletes a blog entry */
      //connect and select
      include 'connection.php';
      $dbc = mysqli_connect($host, $user, $pass, $data);

      if ( isset($_GET['id']) && is_numeric($_GET['id']) ) {
         
         //define the query
         $query = "SELECT title, entry FROM entries WHERE entry_id = {$_GET['id']}";
         if ( $r = mysqli_query($dbc, $query) ) {
            $row = mysqli_fetch_array($r);

            //Make the form
            print '<form action="delete_entry.php" method="post">
                     <p>Are you sure you want to delete this entry?</p>
                     <p><h3>' . $row['title'] . '</h3>' . $row['entry'] . '<br> 
                     <input type="hidden" name="id" value="' . $_GET['id'] . '">
                     <input type="submit" name="submit" value ="Delete This Entry!">
                     </p></form>';
         } else {
            print '<p style="color:red;">Could not retrieve the blog entry because:<br>' . mysqli_error($dbc) . '</p>';
         }
      } elseif ( isset($_POST['id']) && is_numeric($_POST['id']) ) {
         //define the query
         $query = "DELETE FROM entries WHERE entry_id={$_POST['id']} LIMIT 1";
         $r = mysqli_query($dbc, $query);

         //Report the results
         if ( mysqli_affected_rows($dbc) == 1 ) {
            print '<p>The blog entry has been deleted.</p>';
         } else {
            print '<p style="color:red;">Could not delete the blog entry because:<br>' . mysqli_error($dbc) . '</p>';
         }
      } else {
         print '<p style="color:red;">This page has been accessed in error.</p>';
      }
   ?>
</body>
</html>