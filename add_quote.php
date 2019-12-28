<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Add A Quotation</title>
</head>
<body>
   <?php  //Script 11.1 - add_qoute.php

      // Identify the file to use
      $file = '../quotes.txt';

      // Check for a form submission:
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         // Handle form
         if (!empty($_POST['quote']) && ($_POST['quote'] != 'Enter your quotation here.')) {
            //Need something to write
            if (is_writable($file)) {//Confirm that the file is writable

               //Write the data to the file
               file_put_contents($file, $_POST['quote']. PHP_EOL, FILE_APPEND);
               
               //Print a message
               print '<p>Your quotation has been stored.</p>';
            } else { //If the file cannot be opened
               print '<p style="color:red;">Your quotation could not be stored due to a system error.</p>';
            }
         } else { //No quotation entered
            print '<p style="color:red;">Please enter a quotation!</p>';
         }
      }

   ?>

   <form action="add_quote.php" method="post">
      <textarea name="quote" id="quote" cols="30" rows="5">Enter your quotation here.</textarea><br>
      <input type="submit" value="Add This Quote" name="submit">
   </form>
</body>
</html>