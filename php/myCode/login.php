<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Login</title>
</head>
<body>
   <h1>Login</h1>
   <?php //Script 11.8 - login.php

      /* This script logs a user in by checking the stored values in a text file */

      //Identify the file to use:
      $file = '../users/learn/users.txt';

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $loggedin = false;

         //Enable auto_detact_line_settings:
         ini_set('auto_detect_line_endings', 1);

         //Open the file:
         $fp = fopen($file, 'rb');

         // Loop through the file:
         while ($line = fgetcsv($fp, 200, "\t")) {
            // check the file data against the submitted data:
            if ( ($line[0] == $_POST['username']) AND ($line[1] == sha1(trim($_POST['password']))) ) {
               $loggedin = true;
               break;
            }
         }
         fclose($fp);

         //print a message:
         if ($loggedin) {
            print '<p>You are now logged in.</p>';
         } else {
            print '<p style="color: red;">The username and/or password you entered do not match those on file.</p>';
         }
      } else {
         //leave php and display the form
   ?>
   <form action="login.php" method="post">
         <p>Username: <input type="text" name="username" id="username"></p>
         <p>Password: <input type="password" name="password" id="password"></p>
         <input type="submit" value="Login" name="submit">
   </form>
   <?php } ?>
</body>
</html>