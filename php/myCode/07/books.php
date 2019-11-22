<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Larry's Ullman's Books and Chapters</title>
</head>
<body>
   <h1>Some of Larry Ullman's Books</h1>
   <?php //Script 7.4 - books.php
      ini_set('display_errors', 1);
      error_reporting(E_ALL);
      
      $phpvqs = [
         1 => 'Getting Started with PHP', 'Variables', 'HTML Forms and PHP', 'Using Numbers'
      ];
      $phpadv = [
         1 => 'Advance PHP Techniques', 'Developing Web Applications', 'Advanced Database Concepts', 'Basic Object-Oriented Programming'
      ];
      $phpmysql = [
         1 => 'Introduction to PHP', 'Programming with PHP','Creating Dynamic websites', 'Introduction to MySQL'
      ];

      $books = [
         'PHP VQS' => $phpvqs,
         'PHP Advance VQS' => $phpadv,
         'PHP and MySQL VQS' => $phpmysql
      ];

      print "<p>The third chapter of my first book is <i>{$books['PHP VQS'][3]}</i>.</p>";
      print "<p>The first chapter of my second book is <i>{$books['PHP Advance VQS'][1]}</i>.</p>";
      print "<p>The fourth chapter of my fourth book is <i>{$books['PHP and MySQL VQS'][4]}</i>.</p>";

      foreach ($books as $title => $chapters) {
         print "<p>$title";
         foreach ($chapters as $number => $chapter) {
            print "<br>Chapter $number is $chapter";
         }
         print "</p>";
         
      }
   ?>
</body>
</html>