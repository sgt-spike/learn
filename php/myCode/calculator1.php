<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Cost Calculator</title>
</head>
<body>
   <?php // Script 10.4 - calculator1.php

      $tax = 8.75;
      
      function calculate_total ($quantity, $price) {

         global $tax;

         $total = $quantity * $price;
         $taxrate = ($tax / 100) + 1;
         $total = $total * $taxrate;
         $total = number_format($total, 2);

         return $total;
      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         if (is_numeric($_POST['quantity']) AND is_numeric($_POST['price'])) {
            $total = calculate_total($_POST['quantity'], $_POST['price']);
            print "<p>Your total comes to $<span style=\"font-weight: bold;\">$total</span>, including the $tax% tax rate.</p>";
         } else {
            print '<p style="color: red;">Please enter a valid quantity and price!</p>';
         }
      }
   ?>
   <form action="" method="post">
      <p>Quantity: <input type="text" name="quantity" id="quantity" size="3"></p>
      <p>Price: <input type="text" name="price" id="price" size="5"></p>
      <input type="submit" value="Calculate!" name="submit">
   </form>
</body>
</html>