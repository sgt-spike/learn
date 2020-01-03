<?php // Script 13.8 - view_quotes.php
   /* This script lists every quote */
   // Set page title and include header
   define('TITLE', 'View All Quotes');
   include 'templates/header.html';

   echo '<h2>All Quotes</h2>
         <p>Sort Quotes: <a href="view_quotes.php">All Quotes</a> <=> <a href="view_quotes.php?favorites=true">Favorites</a> <=> <a href="view_quotes.php?source=true">Source</a></p>';
   getUserSession();
   // Restrict access to admin links
   // if (!is_administrator()) {
   //    print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page</p>';
   //    include 'templates/footer.html';
   //    exit();
   // }

   //Need database connection
   include 'includes/connection.php';

   //define the query
   if (isset($_GET['favorites'])) {
      $query = 'SELECT quote_id, quote, source, favorite FROM quotes WHERE favorite = 1 ORDER BY date_entered DESC';
   } elseif (isset($_GET['source'])) {
      $query = 'SELECT quote_id, quote, source, favorite FROM quotes ORDER BY source ASC';
   } else {
      $query = 'SELECT quote_id, quote, source, favorite FROM quotes ORDER BY date_entered DESC';
   }   
   //Run query
   if ($result = mysqli_query($dbc, $query)) {
      // Retrieve the results
      while ($row = mysqli_fetch_array($result)) {
         print "<div><blockquote>{$row['quote']}<br><br>- {$row['source']}</blockquote>\n";

         //is this a favorite
         if ($row['favorite'] == 1) {
            print '<strong class="fav">Favorite!</strong>';
         }

         //Add Admin links
         if (is_administrator()) {
            print "<p><b>Quote Admin:</b> <a href=\"index.php\">Home</a> <=> <a href=\"edit_quote.php?id={$row['quote_id']}\">Edit</a> <=> <a href=\"delete_quote.php?id={$row['quote_id']}\">Delete</a></p><hr>\n";
         } else {
            print '<p><a href="index.php">Home</a></p>';
         }
         
      }
   } else {
      print '<p class="error">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '</p>';
   }

   mysqli_close($dbc);

   include 'tempplates/footer.html';
?>