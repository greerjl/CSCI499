<?php
require("/var/www/html/CSCI499/PHPMailer/PHPMailerAutoload.php");
include './processSignupForm.php';
include '../signup.php';
$mail = new PHPMailer;
$mail->setFrom('HouseUtilitiesManager@gmail.com', 'HUM');

$mail->addAddress($email, $username);
$mail->Subject  = 'Welcome to HUM!';
$mail->isHTML(true);
$mail->Body = '<html<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></head>';
$mail->Body = ' <body><div class="header"><h1>House Utilities Manager</h1><h2>An application for all your house management needs. </h2></div>';
$mail->Body = ' <div class="content"><h4>Hello, </h4><p> Thanks for signing up for House Utilities Manager. We are very excited to have you on board.</p>';
$mail->Body = ' <p> To get started using HUM, please confirm your account below: </p><br><form action="http://www.houseutil.com/HTML/verified.php?email='.$email.'&hash='.$accesskey'"><button class="btn btn-lg btn-primary btn-block" type="submit">Confirm your account</button></form>';
$mail->Body = ' <p> Thanks, <br> The HUM Team </p></body>';

$mail->AltBody = "Hi <?php echo $username; ?>, Thanks for signing up for House Utilities Manager. We are very
    excited to have you on board! To get started using HUM, please confirm your account below:";

if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}
?>
