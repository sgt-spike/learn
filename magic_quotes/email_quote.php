<?php // Script 13.12 - emmail_quote.php
   /* This page offers a user to email a quote to be added to the application */
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   use PHPMailer\PHPMailer\SMTP;

   include '../../phpmailer/PHPMailer/src/Exception.php';
   include '../../phpmailer/PHPMailer/src/PHPMailer.php';
   include '../../phpmailer/PHPMailer/src/SMTP.php';

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['name'])) {
         $name = htmlentities($_POST['name']);
      } else {
         echo '<p class="error">Please provide your name.</p>';
      }
      if (isset($_POST['email'])) {
         $email = htmlentities($_POST['email']);
      } else {
         echo '<p class="error">Please provide your email.</p>';
      }
      if (isset($_POST['quote'])) {
         $quote = htmlentities($_POST['quote']);
      } else {
         echo '<p class="error">Please provide the quote.</p>';
      }
      if (isset($_POST['source'])) {
         $source = htmlentities($_POST['source']);
      } else {
         echo '<p class="error">Please provide the source.</p>';
      }

      /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
      $mail = new PHPMailer;

      $mail->isSMTP();
      $mail->SMTPAuth = true;
      //$mail->SMTPDebug = 2;

      $mail->Host = 'smtp.mailtrap.io';
      $mail->Username = '09d5fdf5ef58f3';
      $mail->Password = '913c8053b8c059';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 2525;

      $mail->From = $email;
      $mail->Name = $name;
      $mail->addReplyTo($email, $name);
      $mail->addAddress($email, $name);

      $mail->Subject = 'Please Add this Quote';
      $mail->Body = "<div><blockquote>$quote<br><br>- $source</blockquote></div>";
      $mail->AltBody = $quote . ' ' . $source;
      echo '<p>Message sent! Thank you for the contribution!</p>';
      $mail->send();
   }
   
?>
<h2>Email the Quotation</h2>
<p>Sorry you are not allowed to add quotes to this web site.  Use the form below to email it to us</p>
<div class="form_div" id="email_quote">
   <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      <p><label for="name">Name: <input type="text" name="name" id="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];} ?>"></label></p>
      <p><label for="email">Email: <input type="email" name="email" id="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>"></label></p>
      <p><label for="quote">Quote: <textarea name="quote" id="quote" cols="30" rows="10"><?php if(isset($_POST['quote'])){ echo $_POST['quote'];} ?></textarea></label></p>
      <p><label for="source">Source: <input type="text" name="source" id="source" value="<?php if(isset($_POST['source'])){ echo $_POST['source'];} ?>"></label></p>
      <input type="submit" name="submit" value="Email Qoute"></input>
   </form>
</div>

<?php include 'templates/footer.html'; ?>