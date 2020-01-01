<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="css/sidebar.css">
   <title>Collaosed Sidebar</title>
</head>
<body>
   <nav id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="#">About</a>
      <a href="#">Services</a>
      <a href="#">Clients</a>
      <a href="#">Contact</a>
   </nav>

   <div id="main">
      <button class="openbtn" onclick="openNav()">&#9776</button>
      <h2>Collapsed Sidebar</h2>
      <p id="content"><?php print $_GET['name'];?></p>
      <a href="/sidebarnav.php?name=Brad" class="closebtn">&#9776</a>

      
   </div>
   <script src="js/sidebar.js"></script>
</body>
</html>


