<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Sticky Text Inputs</title>
</head>
<body>
   <?php 
      /* This script defines a calls a funciton that creates a sticky text inputs. */

      //This funciton makes a sticky text input.
      //This function required two arguments be passed to it.
      function make_text_input(string $name, string $label, $size = 20) {

         //Begin a paragraph and a label:
         print '<p><label>' . $label . ': ';

         //Begin in input
         print '<input type="text" name="' . $name . '" size="' . $size . '"';

         //Add the value:
         if (isset($_POST[$name])) {
            print ' value="' . htmlspecialchars($_POST[$name]) . '"';
         }

         // complete the input, the label and the paragraph:
         print '></label></p>';
      }

      print '<form action="" method="post">';
      make_text_input('first_name', 'First Name');
      make_text_input('last_name', 'Last Name', 30);
      make_text_input('email', 'Email Address', 50);      
      print '<input type="submit" name="submit" value="Register!"></form>';
   ?>
</body>
</html>