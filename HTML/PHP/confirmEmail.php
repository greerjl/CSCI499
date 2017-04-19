<?php
$to      = 'jaymelgreer@gmail.com';
$subject = 'Welcome to HUM';

$message = '
//Insert HTML and CSS
<html>
  <head>
    <title>Welcome</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  </head>
  <body>
    <div class="header">
        <h1>House Utilities Manager</h1>
        <h2>An application for all your house management needs. </h2>
    </div><!-- header -->
    <div class="content">
    <h4>Hi </h4>
    <p> Thanks for signing up for House Utilities Manager. We are very
        excited to have you on board.
    </p>
    <br>
    <p> To get started using HUM, please confirm your account below: </p>
    <br>
    <form action="http://www.houseutil.com/HTML/login.php">
      <button class="btn btn-lg btn-primary btn-block" type="submit">
          Confirm your account</button>
    </form>
    <p> Thanks, <br> Jayme Greer and HUM Team </p>
  </body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0'."\r\n";
$headers[] = 'Content-type:text/html;charset=UTF-8'."\r\n";

// Additional headers
$headers[] = 'To: Jayme <jaymelgreer@gmail.com>';
$headers[] = 'From: HUM <HouseUtilitiesManager@gmail.com>';

mail($to, $subject, $message, implode($headers));
?>
