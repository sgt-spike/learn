<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Register</title>
</head>
<body>
   <h2>Register</h2>
   <?php // script 11.6 - register_user
   /* This script registers a user by storing their information in a text file and creating a directory for them */
      // Identify the directory and file to use:
      $dir = '../users/learn/';
      $file = $dir . 'users.txt';

      if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Handle the form
         $problem = FALSE;

         //check for each value...
         if (empty($_POST['username'])) {
            $problem = TRUE;
            print '<p class="error">Please enter a username!</p>';
         }

         if (empty($_POST['password1'])) {
            $problem = TRUE;
            print '<p class="error">Please enter a password!</p>';
         }

         if ($_POST['password1'] != $_POST['password2']) {
            $problem = TRUE;
            print '<p class="error">Your password did not match your confirmed password!</p>';
         }

         if (!$problem) {
            if (is_writable($file)) {
               //create the data to be written:
               $subdir = time() . rand(0, 4596);
               $data = $_POST['username'] . "\t" . sha1(trim($_POST['password1'])) . "\t" . $subdir . PHP_EOL;

               // write the data to the file
               file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

               //create the directory
               mkdir($dir . $subdir);

               //print a success message:
               print '<p>You are now registered!</p>';
            } else { // Couldn't write to the file
               print '<p class="error">You could not be registered due to a system error.</p>';
            }
         } else { //forgot a field
            print '<p class="error">Please go back and try again!</p>';
         }
      } else { //Display the form
         //Leave PHP and display the form.
   ?>

   <form action="register_user.php" method="post">
         <p>Username: <input type="text" name="username" size="20"></p>
         <p>Passowrd: <input type="password" name="password1" id="password1" size="20"></p>
         <p>Confirm Password: <input type="password" name="password2" id="password2" size="20"></p>
         <input type="submit" value="Register" name="submit">
   </form>

   <?php } //end of if statement from above ?>
</body>
</html>