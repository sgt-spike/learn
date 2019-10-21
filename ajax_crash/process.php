<?php
   echo 'Processing....';
   //login.php
   $host='10.20.30.10';
   $dbase='moviesdb';
   $web_user='webuser';
   $passw='web@me';
   $admin_user='moviedb_admin';
   $admin_pw='Bac@2030';

   $conn = mysqli_connect($host, $admin_user, $admin_pw, $dbase);

   //Check for GET variable
   if(isset($_GET['name'])){
      echo 'GET: Your name is '. $_GET['name'];
   }

   //Check for POST variable
   if(isset($_POST['name'])){
      $name = mysqli_real_escape_string($conn, $_POST['name']);

      $query = "INSERT INTO ajaxtest(name) VALUES('$name')";

      if(mysqli_query($conn, $query)){
         echo 'User Added...';
      } else {
         echo 'ERROR: '. mysqli_error($conn);
      }
      //echo 'POST: Your name is '. $_POST['name'];
   }
?>