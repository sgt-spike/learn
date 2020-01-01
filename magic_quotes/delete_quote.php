<?php // Script 13.10 - delete_quote.php
   /* This script deletes a quote */
   //Define the title and include the header
   define('TITLE', 'Delete a Quote');
   include 'templates/header.html';

   print '<h2>Delete a Quotation</h2>';

   //Restrict access to admins only
   if (!is_administrator()) {
      print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page.</p>';
      header("refresh:2;url=https://learn.spikedevelopments.com/magic_quotes/index.php");
      include 'templates/footer.html';
      exit();
   }
   include 'includes/connection.php';

   if ( isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0) ) {
      //Display the quote in a form

      //define the query
      $query = "SELECT quote, source, favorite FROM quotes WHERE quote_id = {$_GET['id']}";
      if ($result = mysqli_query($dbc, $query)) {
         $row = mysqli_fetch_array($result);

         //Make Form
         print '<form action="delete_quote.php" method="post">
                  <p>Are you sure you want to delete this quote?</p>
                  <blockquo><blockquote>' . $row['quote'] . '<br><br>- ' . $row['source'] . '</blockquote>';
                  if ($row['favorite']) {
                     print ' <strong class="fav">Favorite!</strong>';
                  }
         print '</div><br><input type="hidden" name="id" value="' . $_GET['id'] . '">
               <p><input type="submit" name="submit" value="Delete this Quote"></p></form>';
                  
      } else {
         print '<p class="error">Could not retrieve the quote because:<br>' . mysqli_error($dbc) . '</p>';
      }
   } elseif ( isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0) ) {
      //define the query
      $query = "DELETE FROM quotes WHERE quote_id = {$_POST['id']}";
      $result = mysqli_query($dbc, $query);

      if (mysqli_affected_rows($dbc) == 1) {
         print '<p>The quote has been deleted.</p>';
         header("refresh:2;url=https://learn.spikedevelopments.com/magic_quotes/view_quotes.php");
      } else {
         print '<p class="error">Could not delete the quote because:<br>' . mysqli_error($dbc) . '</p>';
      }
   } else {
      print '<p class="error">This page was accessed in error.</p>';
   }
   mysqli_close($dbc);
   include 'templates/footer.html';
?>