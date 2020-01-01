<?php // Script 13.1 - connection.php
   /* This script handles the connection to the database */
   $host = '10.20.30.10';
   $user = 'learn_dev';
   $pass = 'uyVhcU5t68dbdHRr';
   $data = 'learn_dev';

   $dbc = mysqli_connect($host, $user, $pass, $data);
   mysqli_set_charset($dbc, 'utf8');
?>