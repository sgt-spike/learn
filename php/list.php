<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>I have this sirted out</title>
</head>
<body>
   <?php 
      $words_array = explode(' ', $_POST['words']);

      sort($words_array);

      $string_words = implode('<br>', $words_array);

      print "<p>An alphabetized version of your list is: <br>$string_words</p>";
   ?>
</body>
</html>