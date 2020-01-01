<?php // Script 13.7 - add_qoute.php
   /* The script adds a quote. */
   // Define the title and include the header
   define('TITLE', 'Add a Quote');
   include 'templates/header.html';

   print '<h2>Add a Quotation</h2>';

   // Restrict access to addministrators only
   if (!is_administrator()) {
      print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page.</p>';
      include 'templates/footer.html';
      exit();
   }

   //Check for form submission
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      if ( !empty($_POST['quote']) && !empty($_POST['source']) ) {
         // need connection to database
         include 'includes/connection.php';

         // prepare the values for storing
         $quote = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['quote'])));
         $source = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['source'])));

         // Create the favorite value
         if (isset($_POST['favorite'])) {
            $favorite = 1;
         } else {
            $favorite = 0;
         }

         //Construct the query
         $query = "INSERT INTO quotes (quote, source, favorite) VALUES ('$quote', '$source', $favorite)";
         //run the query
         mysqli_query($dbc, $query);

         if (mysqli_affected_rows($dbc) == 1) {
            // print a message
            print '<p>Your quotation has been stored</p>';
         } else {
            print '<p class="error">Could not store the quote because: <br>' .mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
         }
         //close database connection
         mysqli_close($dbc);

      } else {
         print '<p class="error">Please enter a quotation and a source!</p>';
      }
   }
//Lease PHP and display form   
?>
<form action="add_quote.php" method="post">
   <p><label for="quote">Quote <textarea name="quote" id="quote" cols="30" rows="10"></textarea></label></p>
   <p><label for="source">Source <input type="text" name="source" id="source"></label></p>
   <p><label for="favorite">Is this a favorite? <input type="checkbox" name="favorite" id="favorite" value="yes"></label></p>
   <p><input type="submit" name="submit" value="Add This Quote!"></input></p>
</form>

<?php include 'templates/footer.html'; ?>
