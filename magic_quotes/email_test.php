<?php // Script 13.12 - emmail_quote.php
   /* This page offers a user to email a quote to be added to the application */
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   use PHPMailer\PHPMailer\SMTP;

   // include 'PHPMailer/src/Exception.php';
   // include 'PHPMailer/src/PHPMailer.php';
   // include 'PHPMailer/src/SMTP.php';

   include '../../phpmailer/PHPMailer/src/Exception.php';
   include '../../phpmailer/PHPMailer/src/PHPMailer.php';
   include '../../phpmailer/PHPMailer/src/SMTP.php';

   $from = 'Jack Johnson';
   $fromEmail = 'yes@yes.com';

   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   
      $mail = new PHPMailer;

      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->SMTPDebug = 2;

      $mail->Host = 'smtp.mailtrap.io';
      $mail->Username = '09d5fdf5ef58f3';
      $mail->Password = '913c8053b8c059';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 2525;

      $mail->From = $fromEmail;
      $mail->Name = $from;
      $mail->addReplyTo($fromEmail, $from);
      $mail->addAddress($fromEmail, $from);

      $mail->Subject = 'Testing PHP';
      $mail->Body = "Body for Testing PHP email 9:46am";
      $mail->AltBody = "Body for Testing PHP email";

      var_dump($mail->send());

   
?>