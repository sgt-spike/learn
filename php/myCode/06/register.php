<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
</head>

<body>
    <!-- Script 6.1 - registration form -->
    <div>
        <p>Please complete this form to register:</p>
        <form action="php/handle_reg.php" method="post">
            <p>Email Address: <input type="email" name="email" id="email" size="30"></p>
            <p>Password: <input type="password" name="password" id="password" size="20"></p>
            <p>Confirm Password: <input type="password" name="confirm" id="confirm" size="20"></p>
            <p>Date of Birth:
                <select name="month" id="month">
                  <option value="">Month</option>
                  <option value="1">January</option>
                  <option value="2">February</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
               </select>
                <select name="day" id="day">
                  <option value="">Day</option>
                  <?php 
                     for ($i = 1; $i <= 31; $i++) {
                        print "<option value=\"$i\">$i</option>\n";
                     }
                  ?>
               </select>
            </p>
            <p>Favorite Color:
                <select name="color" id="color">
               <option value="">Pick One</option>
               <option value="red">Red</option>
               <option value="yellow">Yellow</option>
               <option value="green">Green</option>
               <option value="blue">Blue</option>
            </select>
            </p>
            <p><input type="checkbox" name="terms" value="Yes" id="terms">I agree to the terms (whatever they may be).</p>
            <input type="submit" value="Register" name="submit">
        </form>
    </div>
</body>

</html>