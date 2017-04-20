<!DOCTYPE html>
<?php require_once("./PHP/functions.php"); ?>
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

    <title>Verified</title>

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
       <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
           </button>
       <!-- Collect the nav links, forms, and other content for toggling -->
       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           <ul class="nav navbar-nav">
             <ul class="nav navbar-nav">
                 <li><a href="./login.php">Login</a></li>
            </ul> </ul>
      </div>
    </div>
  </div>
</div><!--./container -->
 </nav>
      <div class="container">

      <div class="starter-template">
        <div class="header">
          <h1>House Utilities Manager</h1>
          <h2>An application for all your home management needs. </h2>
        </div><!-- header -->
<?php echo $flag?>

	<?php require_once('./PHP/processLoginForm.php'); ?>

        <?php if($_SERVER["REQUEST_METHOD"] == "GET" || $hasErrors) {
        		if($_SESSION["loginErr"] == true){ ?>
        			<div class="alert alert-danger">
        				<strong>Error!</strong> User credentials are incorrect. Enter correct username and password.
        			</div>
      <?php }//if ?>

        <div class="content">
          <?php
          include './PHP/phpmailer.php';
          $search = mysqli_query($db, "SELECT email, accesskey FROM user_info WHERE email='".$email."' AND accesskey='".$accesskey."'") or die(mysql_error());
          $temp = mysqli_fetch_object($search);
          $userEmail = $temp -> email;
          $userAccessKey = $temp -> accesskey;
          $match = mysqli_num_rows($search);


          //debug
          echo $match;
          if($match == 1){
            mysqli_query($db, "UPDATE user_info SET Verified='true' WHERE email='".$userEmail."' AND accesskey='".$userAccessKey."'") or die(mysql_error());
          ?>
            <div class="alert alert-success">
              <strong>Success!</strong> Your account has been activated, you can now login.
            </div>
          <?php
          }
          else{ ?>
            <div class="alert alert-danger">
              <strong>Error!</strong> User has already been activated or this is an invalid url.
            </div>
          <?php }

          ?>
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
