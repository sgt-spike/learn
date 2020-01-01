<?php // Script 13.5 - login.php
   /* THis page lets people log into the site. */
   $loggedin = false;
   $error = false;

   //Check if the form has been submitted
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Handle the form
      if ( !empty($_POST['email']) && !empty($_POST['password']) ) {
         if ( (strtolower($_POST['email']) == 'btchriss@gmail.com') && ($_POST['password'] == 'brad2030') ) {
            // Create Cookie and Session
            setcookie('Samuel', 'Clemens', time()+3600);
            session_start();
            $_SESSION['admin'] = true;
            $_SESSION['name'] = 'Samuel';
            $_SESSION['value'] = 'Clemens';
            $loggedin = true;
         } else {
            $error = 'The submitted email and password do not match those on file!';
         }
      } else {
         $error = 'Please make sure you enter both an email and a password!';
      }
   }
   // Set the page title and include the header file:
   define('TITLE', 'Login');
   include 'templates/header.html';

   // Print an error if one exists:
   if ($error) {
      print '<p class="error">' . $error . '</p>';
   }

   // Indicate the user is logged in, or show the form:
   if ($loggedin) {
      print '<p>You are now logged in!</p>';
      header("refresh:2;url=https://learn.spikedevelopments.com/magic_quotes/index.php");
      exit();
   } else {
      //show form
      print '<h2>Login form</h2>
            <form action="login.php" method="post">
               <p><label>Email <input type="email" name="email"></label></p>
               <p><label>password <input type="password" name="password"></label></p>
               <p><input type="submit" name="submit" value="Log In!"></p>
            </form>';
   }
   include 'templates/footer.html';
?>