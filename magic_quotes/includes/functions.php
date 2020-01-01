<?php // Script 13.2 - functions
   /* This script contains individual functions for this web application */
   
   //this function checks if the user is an administrator
   //this function takes two options values.
   // This function returns a Boolean value.
   function is_administrator($name = 'Samuel', $value = 'Clemens') {

      //Check for the session and check its value:
      if (isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value)) {
         return true;
      } else {
         return false;
      }
   }

   //Function for a session instead of using a cookie
   function is_admin($admin = true) {
      if ($admin) {
         return true;
      } else {
         return false;
      }
   }
?>