<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once '../phpmailer/Exception.php';
require_once '../phpmailer/PHPMailer.php';
require_once '../phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if ($code == $temp_code) {

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 't1movies.tup@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 't1movies_123'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('t1movies.tup@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($email_forgot); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'T1 Movies (Verification Code)';
    $mail->Body = "<h2>Verification Code :</h2><h1>$code</h1><h3>Copy and paste it to the Verification code text input!</h3>";

    $mail->send();

    /*$alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';*/
  } catch (Exception $e) {
    /*
    $alert = '<div class="alert-error">
                <span>' . $e->getMessage() . '</span>
              </div>';*/
  }
}
