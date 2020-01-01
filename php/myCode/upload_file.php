<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Upload a file</title>
</head>
<body>
   <?php // Script 11.4 - upload_file.php
      if ($_SERVER['REQUEST_METHO'] == 'POST') {
         // IF statement to handle the form

         //Try to move the uploaded file:
         if (move_uploaded_file($_FILES['the file']['tmp_name'], "/../upload/{$_FILES['the_file']['name']}")) {
            print '<p>Your File has been uploaded.</p>';
         } else { // Handle problems
            print '<p style="color: red;">Your file could not be uploaded because: ';

            //Print a message based upon the error:
            switch ($_FILES['the_file']['error']) {
               case 1:
                  print 'The file exceeds the upload_max_filesize setting in php';
                  break;
               case 2:
                  print 'The file exceeds the MAX_FILE_SIZE setting in the hmtl form';
                  break;
               case 3:
                  print 'The file was only partially uploaded';
                  break;
               case 4:
                  print 'No file uploaded';
                  break;
               case 6:
                  print 'The temporary folder does not exist';
                  break;
               default:
                  print 'Something unforeseen happened.';
                  break;
            }

            print '.</p>';
         }
      }
   ?>

   <form action="upload_file.php" method="post" enctype="multipart/form-data">
      <p>Upload a file using this form:</p>
      <input type="hidden" name="MAX_FILE_SIZE" value="300000">
      <p><input type="file" name="the_file" id="the_file"></p>
      <p><input type="submit" value="submit" value="Upload This File"></p>
   </form>
</body>
</html>