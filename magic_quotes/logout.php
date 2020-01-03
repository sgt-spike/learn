<?php // Script 13.6 - logout.php
   /* This script is the logout page.  It destroys the cookie */
   
   //Destroy the cookie, but only after it exists:
   if (isset($_COOKIE['Samuel'])) {
      setcookie('Samuel', FALSE, time()-300);
   }
   session_start();
   $_SESSION = [];
   session_destroy();

   // Define the title of the page and include the header
   define('TITLE', 'Logout');
   include 'templates/header.html';

   print '<p>You are now logged out.</p>';
   

   include 'templates/footer.html';
   header("refresh:2;url=https://learn.spikedevelopments.com/magic_quotes/index.php");
   exit();
?>