<?php // Script 13.2 - functions
   /* This script contains individual functions for this web application */
   
   //this function checks if the user is an administrator
   //this function takes two options values.
   // This function returns a Boolean value.
   function is_administrator() {
      //Check for the session and check its value:
      if ( ($_SESSION['loggedin'] == true) && ($_SESSION['usertype'] == 'admin') ) {
         return true;
      } else {
         return false;
      }
   }

   //Function for a session instead of using a cookie
   function is_admin() {
      if ($admin) {
         return true;
      } else {
         return false;
      }
   }

   //This function is to get the current logged in user name from the session
   function getUserName() {

   }

   function getUserSession() {
      if($_SESSION['loggedin'] == true) {
         echo '<p>Logged in as ' . $_SESSION['name'] . ' and is a ' . $_SESSION['usertype'] . session_status() . '.</p>';
      }

   }
?>