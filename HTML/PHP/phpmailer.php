<?php
date_default_timezone_set('America/Los_Angeles');
require '/var/www/html/CSCI499/PHPMailer/PHPMailerAutoload.php';
include './processSignupForm.php';
include '../signup.php';
$mail = new PHPMailer;
//Enable SMTP debugging
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
//Set PHPMailer to use SMTP
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username="HouseUtilitiesManager@gmail.com";
$mail->Password="getserved69";
//Requires TLS encryption
$mail->SMTPSecure = 'tls';
//Set TCP port to connect to
$mail->Port = 587;

$mail->From = "HouseUtilitiesManager@gmail.com";
$mail->FromName = "HUM";

$mail->addAddress($email, $username);
$mail->Subject  = 'Welcome to HUM!';

$mail->msgHTML(file_get_contents('content.html'), dirname(../));

$mail->AltBody = "Hi <?php echo $username; ?>, Thanks for signing up for House Utilities Manager. We are very
    excited to have you on board! To get started using HUM, please confirm your account below:";

if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}
?>
