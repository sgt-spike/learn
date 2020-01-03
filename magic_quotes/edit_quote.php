<?php // Script 13.9 - edit_quote.php
   /* This script edits a quote */
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   
   //Define page title and include header
   define('TITLE', 'Edit a Quote');
   include 'templates/header.html';

   print '<h2>Edit a Quotation</h2>';

   //Restrict acces to admin
   if ( !is_administrator() ) {
      print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page.</p>';
      include 'templates/footer.html';
      header("refresh:2;url=https://learn.spikedevelopments.com/magic_quotes/index.php");
      exit();
   }

   // Get Database connection
   include 'includes/connection.php';

   // Getting the record to be editted
   if ( isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0) ) {
      // Display the entry in the form
      // define the query'
      $query = "SELECT quote, source, favorite FROM quotes WHERE quote_id={$_GET['id']}";
      //Retrieve the recordset
      if ( $result = mysqli_query($dbc, $query) ) {
         $row = mysqli_fetch_array($result);
         // Make the form
         print '<form action="edit_quote.php" method="post">
                  <p><label>Quote <textarea name="quote" id="quote" rows="10" cols="30">' . htmlentities($row['quote']) . '</textarea></label></p>
                  <p><label>Source <input type="text" name="source" id="source" value="' . htmlentities($row['source']) .'"></label></p>
                  <p><label>Is this a favorite? <input type="checkbox" name="favorite" value="yes"';
                  // Check the box if it is a favorite
                  if ( $row['favorite'] == 1 ) {
                     print ' checked="checked"';
                  }
                  //Complete the form
                  print '></label></p>
                        <input type="hidden" name="id" value="' . $_GET['id'] . '">
                        <p><input type="submit" name="submit" value="Update This Quote!"></p>
                  </form>';
      } else {
         print '<p class="error">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '</p>';
      }
   //Posting the record after it has been editted   
   } elseif ( isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0) ) {
      //Validate and secure the form data
      $problem = false;
      if ( !empty($_POST['quote']) && !empty($_POST['source']) ) {
         //Prepase the values for storing
         $quote_id = $_POST['id'];
         $quote = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['quote'])));
         $source = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['source'])));

         //Create the favorite value
         if ( isset($_POST['favorite']) ) {
            $favorite = 1;
         } else {
            $favorite = 0;
         }
      } else {
         if (empty($_POST['quote'])) {
            echo '<p class="error">Please provide a quotation.</p>';
            $problem = true;
         }
         if (empty($_POST['source'])) {
            echo '<p class="error">Please prove a source for this quotation.</p>';
            $problem = true;
         }
         if ( isset($_POST['favorite']) ) {
            $favorite = 1;
         } else {
            $favorite = 0;
         }
      }

      if (!$problem) {
         
         //DEfine the query
         $query = "UPDATE quotes SET quote = '$quote', source = '$source', favorite = $favorite WHERE quote_id = {$_POST['id']}";
         
         if ($result = mysqli_query($dbc, $query)) {
            print '<p>The quotation has been updated.</p>';
            header("refresh:2;url=https://learn.spikedevelopments.com/magic_quotes/view_quotes.php");
         } else {
            print '<p class="error">Could not update the quotation because:<br>' . mysqli_error($dbc) . '</p>';
         }
      } elseif ($problem) {
         $quote_id = $_POST['id'];
         $quote = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['quote'])));
         $source = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['source'])));

         //Create the favorite value
         if ( isset($_POST['favorite']) ) {
            $favorite = 1;
         } else {
            $favorite = 0;
         }
         echo '<form action="edit_quote.php" method="post">
                  <p><label>Quote <textarea name="quote" id="quote" rows="10" cols="30">' . $quote . '</textarea></label></p>
                  <p><label>Source <input type="text" name="source" id="source" value="' . $source .'"></label></p>
                  <p><label>Is this a favorite? <input type="checkbox" name="favorite" value="yes"';
                  // Check the box if it is a favorite
                  if ( $favorite == 1 ) {
                     print ' checked="checked"';
                  }
                  //Complete the form
                  print '></label></p>
                        <input type="hidden" name="id" value="' . $quote_id . '">
                        <p><input type="submit" name="submit" value="Update This Quote!"></p>
                  </form>';
      }
   } else {
      '<p class="error">This page has been accessed in error.</p>';
   }

   mysqli_close($dbc);
   include 'templates/footer.html';

?>