<?php

   //login.php
   $host='10.20.30.10';
   $dbase='moviesdb';
   $web_user='webuser';
   $passw='web@me';
   $admin_user='moviedb_admin';
   $admin_pw='Bac@2030';
   // Create Connection to DB
   $conn = mysqli_connect($host, $web_user, $passw, $dbase);
   // Query DB
   $query = 'SELECT * FROM ajaxtest';
   // Get Results
   $result = mysqli_query($conn, $query);
   // Fetch Data
   $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

   echo json_encode($users);

?>