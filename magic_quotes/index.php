<?php // Script 13.11 - index.php
   /* THis is the home page for this site. It displays:
      - The most recent quote (default)
      - Or, a random quote
      - Or, a random favorite quote */
   
   // Include the header:
   include 'templates/header.html';

   // Need to include the database connection file
   include 'includes/connection.php';
   
 
   // Define the query
   //Chnage the particulars depending upon values passed in the url
   if (isset($_GET['random'])) {
      $query = 'SELECT quote_id, quote, source, favorite FROM quotes ORDER BY RAND() DESC LIMIT 1';
   } elseif (isset($_GET['favorite'])) {
      $query = 'SELECT quote_id, quote, source, favorite FROM quotes WHERE favorite=1 ORDER BY RAND() DESC LIMIT 1';
   } else {
      $query = 'SELECT quote_id, quote, source, favorite FROM quotes ORDER BY date_entered DESC LIMIT 1';
   }

   // Run the query:
   if ($result = mysqli_query($dbc, $query)) {
      
      // Retrieve the results
      $row = mysqli_fetch_array($result);
      // Print the record
      print "<div><blockquote>{$row['quote']}<br><br>- {$row['source']}</blockquote>";

      //If this is a favorite
      if ($row['favorite'] == 1) {
         print ' <strong class="fav">Favorite!</strong>';
      }
      //complete the div
      print '</div>';

      // If admin is logged in, display admin links for this record
      if (is_administrator()) {
         print "<p><b>Quote Admin:</b> <a href=\"edit_quote.php?id={$row['quote_id']}\">Edit</a> <-> <a href=\"delete_quote.php?id={$row['quote_id']}\">Delete</a></p>\n";
      } 
   } else {
      //query didn't run
      print '<p class="error">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '</p>';
   }
   
   // Close the connection
   mysqli_close($dbc);

   print '<p><a href="index.php">Latest</a> <=> <a href="index.php?random=true">Random</a> <=> <a href="index.php?favorite=true">Favorite</a> <=> <a href="view_quotes.php">View All</a> <=> <a href="login.php">Login</a> <=> <a href="logout.php">Logout</a> <=> <a href="register.php">Register</a></p>';

   // include the footer
   include 'templates/footer.html';
?>