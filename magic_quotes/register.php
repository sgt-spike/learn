<?php // Script 13.12 - register.php
   /* This is the registration pager of the site */
   define('TITLE', 'Site Registration');
   include 'templates/header.html';
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   
   if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $problem = false;
      if (empty($_POST['first_name'])) {
         $problem = true;
         echo '<p class="error">Please enter your first name</p>';
      }
      if (empty($_POST['last_name'])) {
         $problem = true;
         echo '<p class="error">Please enter your last name</p>';
      }
      if (empty($_POST['email'])) {
         $problem = true;
         echo '<p class="error">Please enter your email</p>';
      }
      if (empty($_POST['password'])) {
         $problem = true;
         echo '<p class="error">Please enter your password</p>';
      }

      if (!$problem) {
         //query db for existing user
         //insert the user record
         include 'includes/connection.php';
         $firstname = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['first_name'])));
         $lastname = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['last_name'])));
         $email = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['email'])));
         $password = password_hash(mysqli_real_escape_string($dbc, trim(strip_tags($_POST['password']))),PASSWORD_DEFAULT);

         $query = "SELECT email from users WHERE email = $email";

         if (!$results = mysqli_query($dbc, $query)) {
            //The user doesn't exist
            $query = "INSERT INTO users (first_name, last_name, email, password, user_type) VALUES ('$firstname', '$lastname', '$email', '$password', 'webuser')";
            mysqli_query($dbc, $query);
            if (mysqli_affected_rows($dbc) == 1) {
               // $_SESSION['name'] = $firstname;
               // $_SESSION['usertype'] = 'webuser';
               // $_SESSION['loaggedin'] = true;
               //print_r($_SESSION);
               echo '<p>You have successfully registered for access</p>';
               header("refresh:2;url=https://learn.spikedevelopments.com/magic_quotes/index.php");
            } else {
               print '<p class="error">Could not store the user information because: <br>' .mysqli_error($dbc) . '.</p>';
            }
         } elseif (mysqli_affected_rows($dbc) >= 1) {
            echo '<p class="error">This user already exists! Try logging in</p>';
         } else { 
            //User exists
            print '<p class="error">Could not store the user information because: <br>' .mysqli_error($dbc) . '.</p>';
         }
         
      }
   }
?>
<div class="form_div">
   <form action="register.php" method="post" id="register">
      <p><label for="first_name">First Name: <input class="form_inputs" type="text" name="first_name" id="first_name" value="<?php if(isset($_POST['first_name'])): echo $_POST['first_name'];endif; ?>"></label></p>
      <p><label for="last_name">Last Name: <input class="form_inputs" type="text" name="last_name" id="last_name" value="<?php if(isset($_POST['last_name'])): echo $_POST['last_name'];endif; ?>"></label></p>
      <p><label for="email">Email: <input class="form_inputs" type="email" name="email" id="email" value="<?php if(isset($_POST['email'])): echo $_POST['email'];endif; ?>"></label></p>
      <p><label for="password">Password: <input class="form_inputs" type="password" name="password" id="password" value="<?php if(isset($_POST['password'])): echo $_POST['password'];endif; ?>"></label></p><br>
      <input type="submit" name="submit" value="Register"></input>
   </form>
</div>
<?php include 'templates/footer.html'; ?>