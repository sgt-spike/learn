<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Greetings!</title>
   <style>
      .bold {
         font-weight: bolder;
      }
   </style>
</head>
<body>
<!-- Script 3.6 - hello.php -->

<div><p>Click a link to say hello:</p></div>

<ul>
   <li><a href="hello.php?name=Brad">Brad</a></li>
   <li><a href="hello.php?name=Tammy">Tammy</a></li>
   <li><a href="hello.php?name=Jessica">Jessica</a></li>
   <li><a href="hello.php?name=Makalya">Makayla</a></li>
   <li><a href="hello.php?name=Katie">Katie</a></li>
   <li><a href="hello.php?name=Trinity">Trinity</a></li>
</ul>

<?php 
   // script 3.7 - hello.php
   //Learn from mistakes
   ini_set('display_errors',1);
   //show all errors
   error_reporting(E_ALL);

   // This page should receive a name value in the URL
   // Say Hello
   $name = $_GET['name'];
   print "<p>Hello, <span class=\"bold\">$name</span>!</p>";
?>
   
</body>
</html>