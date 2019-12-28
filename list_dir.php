<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Directory Content</title>
</head>
<body>
   <?php //script 11.5 - list_dir.php 
      // This script list the directories and files in a directory

      //set the time zone:
      date_default_timezone_set('America/New York');

      // Set the directory name and scan it:
      $search_dir = '../../../usr/share/media_chriss/Movies';
      $contents = scandir($search_dir);

      //list the directories first...
      //print a caption and start a list
      print '<h2>Directories</h2>
      <ul>';
      foreach ($contents as $item) {
         if ( (is_dir($search_dir . '/' . $item)) AND (substr($item, 0, 1) != '.')) {
            print "<li>$item</li>\n";
         }
      }
      print '</ul>';

      //create a table header
      print '<hr><h2>Files</h2><table cellpadding="2" cellspacing="2" align="left"><tr><th>Name</th><th>Size</th><th>Last Modified</th></tr>';

      //List the files:
      foreach ($contents as $folder) {
         if ((is_dir($search_dir . '/' . $folder)) AND (substr($folder, 0, 1) != '.')) {
            $folder_contents = scandir($search_dir . '/' . $folder);
            foreach ($folder_contents as $item) {
               if ((is_file($search_dir . '/' . $folder . '/' . $item)) AND (substr($item,0,1) != '.')) {
                  // Get the file size:
                  $fs = filesize($search_dir . '/' . $folder . '/' . $item);

                  // Get the file's modifcation date:
                  $lm = date('F j, Y', filemtime($search_dir . '/' . $folder . '/' . $item));

                  //print the information inside each table row
                  print "<tr><td>$item</td><td>$fs bytes</td><td>$lm</td></tr>\n";
               }
            }
         }
      }
      //print closing table tag
      print '</table>';

   ?>
</body>
</html>