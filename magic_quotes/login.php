<?php // Script 13.5 - login.php
   /* THis page lets people log into the site. */
   $loggedin = false;
   $error = false;

   //Check if the form has been submitted
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Handle the form
      if ( !empty($_POST['email']) && !empty($_POST['password']) ) {
         //Start database connection
         include 'includes/connection.php';
         //create varibles from $_POST
         $email = htmlentities($_POST['email']);
         $password = htmlentities($_POST['password']);

         //Query database for user
         $query = "SELECT first_name, email, password, user_type FROM users WHERE email = '$email'";

         if ($result = mysqli_query($dbc, $query)) {
            // If a record is returned log verify and login
            //create variable array from returned record
            $row = mysqli_fetch_array($result);

            if ( ($row['email'] == $email) && (password_verify($password, $row['password'])) ) {
               //create the session
               $loggedin = true;
               session_start();
               $_SESSION['name'] = $row['first_name'];
               $_SESSION['usertype'] = $row['user_type'];
               $_SESSION['loggedin'] = true;
            } else {
               $error = 'The email and password combination does not match!  Please Try Again.';
            }

         } elseif (!$result = mysqli_query($dbc, $query)) {
            //if no records are returned send error message
            $error = 'The submitted email and password do not match those on file!  Try again or register for access';
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
      echo "<p>Your log in is complete.</p>";
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
   mysqli_close($dbc);
   include 'templates/footer.html';
?>