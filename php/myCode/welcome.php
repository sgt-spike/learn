<?php // Script 9.7 - welcome.php #2
   // This is the welcome page. the user is redirected here after they successfully log in.

   // Need to start a session
   session_start();

   define('TITLE', 'Welcome to the J.D. Salinger Fan Club!');
   include('templates/header.html');

   //print a greeting
   print '<h2>Welcome to the J.D. Salinger Fan Club!</h2>';
   print '<p>Hello, ' . $_SESSION['email'] . '!</p>';

   //print how long they've been longed in
   date_default_timezone_set('America/New_York');
   print '<p>You have been logged in since: ' . date('g:i a', $_SESSION['loggedin']) . '.</p>';

   //Log off button
   print '<p><a href="logout.php">Logout</a></p>';

   include('templates/footer.html');
?>
