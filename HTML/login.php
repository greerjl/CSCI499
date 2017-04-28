<!DOCTYPE html>
<?php session_start();
require_once("./PHP/functions.php");
 ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="../CSS/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/login.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/psuedoWelcome.css"/>
    <link rel="icon" href="../images/logo.png">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/css/starter-template.css" rel="stylesheet">
    <link href="../bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../bootstrap/css/signin.css" rel="stylesheet">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

 </head>

 <body data-gr-c-s-loaded="true">
 <nav class="navbar navbar-inverse navbar-fixed-top">
   <div class="container">
     <div class="navbar-header">
       <a class="navbar-brand" href="../index.html"> House Utilities Manager </a>
     </div>
   </div><!--./container -->
 </nav>
      <div class="container">

      <div class="starter-template">
        <div class="header">
          <h1>House Utilities Manager</h1>
          <h2>An application for all your home management needs. </h2>
        </div><!-- header -->
<?php
  include '../../dbconnect.php';

  //if directed from email GET attributes
  $urlEmail = $_GET['email'];
  $urlHash = $_GET['hash'];
  $urlVerified = $_GET['verified'];

  if($urlVerified == '0'){
    //select UID
    $sql2 = "SELECT UID FROM user_info WHERE email='$urlEmail' AND accesskey='$urlHash'";
    $result2 = mysqli_query($db, $sql2);
    $temp = mysqli_fetch_object($result2);
    $dbUID = $temp->UID;
    //update user
    $sql = "UPDATE user_info SET Verified='1' WHERE UID='$dbUID'";
    $result = mysqli_query($db, $sql);
    //Message

    ?>
      <div class="alert alert-success">
        <strong>Success!</strong> Your account has been verified. Please log in.
      </div>
  <?php  }//if

	require_once('./PHP/processLoginForm.php');

        if($_SERVER["REQUEST_METHOD"] == "GET" || $hasErrors) {
        		if($_SESSION["loginErr"] == true){ ?>
        			<div class="alert alert-danger">
        				<strong>Error!</strong> User credentials are incorrect. Enter correct username and password.
        			</div>
      <?php }//banner if ?>

        <div class="content">
          <form id="LogIn" class="form-signin" method="POST" action="./PHP/processLoginForm.php">
            <h2 class="form-signin-heading"> Log In </h2>

            <input type="email" id="email" class="form-control"
            name="useremail" placeholder="Email address" autofocus required/>

            <input type="password" id="password" name="pswd"
            pattern="(?=.*\d).{6,}" class="form-control"
            placeholder="Password" required/>

            <!-- <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div> -->

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

            Don't have an account? <a href="./signup.php"> Sign up </a>
	        </form>
          <?php }//request method if ?>
      </div><!-- /.content -->
    </div><!--/.starter template -->
  </div> <!-- /.container -->
    <footer class="footer">
      <div class="container">
        <p class="text muted">Capstone Production: September 2016 - May 2017. Authors <a target="_blank" href="https://www.linkedin.com/in/gagedgibson">Gage Gibson</a>,
        <a target="_blank" href="https://www.linkedin.com/in/jaymegreer">Jayme Greer</a> and Caleb LaVergne.</p>
      </div><!--/.container-->
    </footer>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../bootsrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="./ui.js"></script>
  </body>
</html>
