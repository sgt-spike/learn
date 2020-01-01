<?php //Script 8.9
   /* This page lets people register for ths site (in theory). */

   // Set the page title and include the header file:
   define('TITLE', 'Register');
   include 'templates/header.html';

   // Print some introductory text:
   print '<h2>Registration Form</h2>
         <p>Register so that you can take advantage of certain features like this, that, and the other thing</p>';

   // Check if the form has been submitted:
   if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

      $problem = false;
      print $problem;
      // Check for each value
      if ( empty($_POST['first_name']) ) {
         $problem = true;
         print '<p class="text--error">Please enter your first name!</p>';
      }

      if ( empty($_POST['last_name']) ) {
         $problem = true;
         print '<p class="text--error">Please enter your last name!</p>';
      }

      if ( empty($_POST['email']) ) {
         $problem = true;
         print '<p class="text--error">Please enter your email!</p>';
      }

      if ( empty($_POST['password1']) ) {
         $problem = true;
         print '<p class="text--error">Please enter your password!</p>';
      }

      if ( $_POST['password1'] != $_POST['password2'] ) {
         $problem = true;
         print '<p class="text--error">Your passwords do not match!</p>';
      }

      if (!$problem) {
         
         //Print a Message:
         print '<p class="text--sucess">You are now registered!<br>Okay, you are not really registered but...</p>';

         //Send Email Response
         $body = "Thank you, {$_POST['first_name']}, for registering with the J.D. Salingeer fan club!'.";
         mail($_POST['email'], 'Registration Confirmation', $body, 'form: admin@example.com');

         //Clear posted values
         $_POST = [];
      } else {
         print '<p class="text--error">Please try again</p>';
      }
   }
?>

<form action="register.php" method="post" class="form--inline">

   <p><label for="first_name">First Name:</label><input type="text" name="first_name" id="first_name" size="20" value="<?php if (isset($_POST['first_name'])){print htmlspecialchars($_POST['first_name']);} ?>"></p>

   <p><label for="last_name">Last Name:</label><input type="text" name="last_name" id="last_name" size="20" value="<?php if(isset($_POST['last_name'])) {print htmlspecialchars($_POST['last_name']);}?>"></p>

   <p><label for="email">Email Address:</label><input type="email" name="email" id="email" size="20" value="<?php if(isset($_POST['email'])) {print htmlspecialchars($_POST['email']);}?>"></p>

   <p><label for="password1">Password: </label><input type="password" name="password1" id="password1" size="20" value="<?php if(isset($_POST['password1'])) {print htmlspecialchars($_POST['password1']);} ?>"></p>

   <p><label for="password2">Confirm Password:</label><input type="password" name="password2" id="password2" size="20" value="<?php if (isset($_POST['password2'])) { print htmlspecialchars($_POST['password2']);} ?>"></p>

   <p><input type="submit" value="Register!" name="submit"class="button--pill"></p>
</form>
<?php include 'templates/footer.html'; ?>