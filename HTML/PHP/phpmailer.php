<?php
require '../../PHPMailer/PHPMailerAutoload.php';
include './processSignupForm.php';
$mail = new PHPMailer;
$mail->setFrom('HouseUtilitiesManager@gmail.com', 'HUM');

$mail->addAddress($email, $username);
$mail->Subject  = 'Welcome to HUM!';
$mail->isHTML(true);
$mail->Body = '
<html>
  <head>
    <title>Welcome</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>

    </style>
  </head>
  <body>
    <div class="header">
        <h1>House Utilities Manager</h1>
        <h2>An application for all your house management needs. </h2>
    </div><!-- header -->
    <div class="content">
    <h4>Hi </h4>
    <?php echo $username; ?>
    <h4> , </h4>
    <p> Thanks for signing up for House Utilities Manager. We are very
        excited to have you on board.
    </p>
    <p> To get started using HUM, please confirm your account below: </p>
    <br>
    <form action="http://www.houseutil.com/HTML/login.php">
      <button class="btn btn-lg btn-primary btn-block" type="submit">
          Confirm your account</button>
    </form>
    <p> Thanks, <br> the HUM Team </p>
  </body>
</html>
';
$mail->AltBody = "Hi <?php echo $username; ?>, Thanks for signing up for House Utilities Manager. We are very
    excited to have you on board! To get started using HUM, please confirm your account below:";

if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}
?>
