<?php
echo "at beginning of file<br/>";

date_default_timezone_set('America/Los_Angeles');
//require '/var/app/current/DocRoot/CSCI499/PHPMailer/PHPMailerAutoload.php';
require '/PHPMailer/PHPMailerAutoload.php';

echo "after require PHPMailerAutoload<br/>";

include './processSignupForm.php';

echo "after include processSignupForm for variables<br/>";
//include '../signup.php';

$mail = new PHPMailer;
//Enable SMTP debugging
$mail->SMTPDebug = 0;
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

//SQL fetch Verified
$sql= "SELECT Verified FROM user_info WHERE email= '$email'";
$sqlResult = mysqli_query($db, $sql);
$temp = mysqli_fetch_object($sqlResult);
$Verified = $temp->Verified;

//$mail->msgHTML(file_get_contents('content.html'));
$mail->isHTML(true);
$mail->Body = '
    <html><head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"></head><body style="padding-left: 1cm; padding-right: 1cm;"><div class="header"><h1>House Utilities Manager</h1><h4>An application for all your house management needs. </h4></div>
    <div class="content" style="padding-left: 1.25cm; padding-right: 1.25cm;"><h4>Hello '.$username.',</h4><p> Thanks for signing up for House Utilities Manager. We are very excited to have you on board.</p>
    <p> To get started using HUM, please confirm your account below: </p><br>
    <a href="http://www.houseutil.com/HTML/login.php?email='.$email.'&hash='.$accesskey.'&verified='.$Verified.'">Confirm your account</a>
    <p> Thanks, <br> The HUM Team </br> </p></body></html>';

$mail->AltBody = "Hi '.$username.', Thanks for signing up for House Utilities Manager. We are very
    excited to have you on board! To get started using HUM, please confirm your account below:";
    //http://www.houseutil.com/HTML/login.php?email='.$email.'&hash='.$accesskey.'verified=1;"

echo "before mail->send()<br/>";
    if(!$mail->send()) {
      //echo 'Message was not sent.';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo "Message has been sent.";
    }//ifelse
?>
