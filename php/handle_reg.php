<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <style>
      .error {
         color: red;
      }
   </style>
   <title>Registration</title>
</head>
<body>
   <h1>Registration Results</h1>
   <?php // Script 6.2 - handle_reg.php
   /* This script receives seven values from register.html:
      email, password, confirm, year, terms, color, submit
   */

   // Error Handling
      ini_set('display_errors', 1);
      error_reporting(E_ALL);
      //Flag to track success
      $ok = true;
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirm = $_POST['confirm'];
      $year = $_POST['year'];
      $color = $_POST['color'];
      $terms = $_POST['terms'];

      //Validate email address
      if (empty($_POST['email'] )) {
         print '<p class="error">Please enter your email address.</p>';
         $ok = false;
      }

      //Validate password
      if (empty(trim($_POST['password']))) {
         print '<p class="error">Please enter your password.</p>';
         $ok = false;
      }

      if (trim($_POST['password']) != trim($_POST['confirm'])) {
         print '<p class="error">Your confirmed password does not match the original password.</p>';
         $ok = false;
      }

      //Validate birth year
      if (is_numeric($_POST['year']) && (strlen($_POST['year']) == 4)) {
         if ($_POST['year'] < 2019) {
            $age = 2019 - $_POST['year'];
         } else {
            print '<p class="error">Either you entered your birth year wrong or you come from the future!</p>';
            $ok = false;
         }
      } else {
         print '<p class="error">Please enter the year you were born as four digits.</p>';
         $ok = false;
      }

      if (!isset($_POST['terms']) && ($_POST['terms'] != 'Yes')) {
         print '<p class="error">You must accept the terms</p>';
         $ok = false;
      }

      switch ($_POST['color']) {
         case 'red':
            $color_type = 'primary';
            break;
         case 'yellow':
            $color_type = 'primary';
            break;
         case 'blue':
            $color_type = 'primary';
            break;
         case 'green':
            $color_type = 'secondary';
            break;
         default:
            print '<p class="error">Please select your favorite color</p>';
            $ok = false;
            break;
      }

      if ($ok) {
         print "<p>You have been successfully registered (but not really).</p>";
         print "<p>You will turn $age this year.</p>";
         print "<p>Your favorite color is $color and it is a $color_type color</p>";
      }
   ?>
</body>
</html>