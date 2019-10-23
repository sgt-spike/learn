<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Your Feedback</title>
</head>
<body>
   <?php 
      ini_set('display_errors', 1);
      error_reporting(E_ALL);
      $title = $_POST['title'];
      $name = $_POST['name'];
      $response = $_POST['response'];
      $comments = $_POST['comments'];

      print "<p>Thank you, $title $name, for your comments.
      <p>You stated that you found this example to be \"$response\" and added: <br>$comments</p></p>";
   ?>
</body>
</html>