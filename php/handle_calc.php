<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Product Cost Calculator</title>
   <style>
      .number {
         font-weight: bold;
      }
   </style>
</head>
<body>
   <?php // Script 4.2 - handle_calc.php
      /* This script takes values from calculator.html
         and performs total cost and monthly payment calculations. */

      // Address error handling, if you want

      // Get the values from the $_POST array:
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];
      $discount = $_POST['discount'];
      $tax = $_POST['tax'];
      $shipping = $_POST['shipping'];
      $payments = $_POST['payments'];

      // Calculate total
      $total = $price * $quantity;
      $total = $total + $shipping;

      //Calculate Discount
      $discountrate = $discount / 100;
      //$discountrate = $discountrate + 1;
      $discount = $total * $discountrate;
      $total = $total - $discount;

      //Determine the tax rate
      $taxrate = $tax / 100;
      $taxrate++;

      //Factor in the tax rate
      $total = $total * $taxrate;

      //Calculate monthly payments
      $monthly = $total / $payments;

      $total = number_format($total, 2);
      $monthly = number_format($monthly, 2);

      $first = mt_rand(0,9);
      $second = mt_rand(0,9);

      $sum = $first + $second;

      print "<p>You have selected to purchase:<br>
               <span class=\"number\">$quantity</span> widget(s) at $<span class=\"number\">$price</span> price each <br>
               plus a $<span class=\"number\">$shipping</span> shipping cost <br>
               and a $<span class=\"number\">$tax</span>% tax rate. <br>
               After your $<span class=\"number\">$discount</span> discount, the total cost is $<span class=\"number\">$total</span>.<br>
               Divided over <span class=\"number\">$payments</span> monthly payments, that would be $<span class=\"number\">$monthly</span> each.<br>
               $first + $second = $sum
            </p>"

   ?>
</body>
</html>