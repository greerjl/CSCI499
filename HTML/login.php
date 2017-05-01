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

    <title>HUM Login</title>
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
   <nav class="navbar navbar-default">
     <div class="container-fluid">
       <div class="navbar-header">
           <a class="navbar-brand" href="../index.html">House Utilities Manager</a>
       </div>
       <div class="collapse navbar-collapse" id="mainNavBar">
         <ul class="nav navbar-nav">
           <li><a href="./signup.php">Sign Up</a></li>

       </div><!-- /.navbar-collapse -->
     </div><!-- /.container-fluid -->
   </nav>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
      <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">House Settings
                    <small>Create a group and edit group name, add rooms, and invite members to join.</small>
                </h1>
            </div>
        </div><!-- /.row -->
<?php

  include '../../dbconnect.php';

  //if directed from email GET attributes
  $urlEmail = $_GET['email'];
  $urlHash = $_GET['hash'];
  $urlVerified = $_GET['verified'];
  $urlGID = $_GET['gid'];
  $urlEmail2 = $_GET['email2'];

  if($urlVerified == '0') {
    //select UID
    $sql = "SELECT UID FROM user_info WHERE email='$urlEmail' AND accesskey='$urlHash'";
    $result = mysqli_query($db, $sql);
    $temp = mysqli_fetch_object($result);
    $dbUID = $temp->UID;
    //update verify new user
    $sql2 = "UPDATE user_info SET Verified='1' WHERE UID='$dbUID'";
    $result2 = mysqli_query($db, $sql2);
    //Bootstrap Alert Banner
    ?>
      <div class="alert alert-success">
        <strong>Success!</strong> Your account has been verified. Please log in.
      </div>
    <?php
  }//if

  if(isset($urlGID)) {
    //select UID
    $sql = "SELECT UID FROM user_info WHERE email='$urlEmail2'";
    $result = mysqli_query($db, $sql);
    $temp = mysqli_fetch_object($result);
    $dbUID = $temp->UID;
    //update GID
    $sql2 = "UPDATE user_info SET GID='$urlGID' WHERE UID='$dbUID'";
    $result2 = mysqli_query($db, $sql2);
    //Bootstrap Alert Banner
    ?>
      <div class="alert alert-success">
        <strong>Success!</strong> You are now part of a new group!
      </div>
    <?php
    }//if

  //global $loginErr;
  include './PHP/processLoginForm.php';
  if($_SERVER["REQUEST_METHOD"] == "GET") {
    if($_SESSION["loginErr"] == 1){ ?>
      <div class="alert alert-danger">
        <strong>Error!</strong> User credentials are incorrect. Enter correct username and password.
      </div>
  <?php logout(); }//if ?>

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

    <!-- Footer -->
    <div id="footer">
        <div class="container">
          <p class="text-muted">Copyright ©2016-2017 PLU Capstone. House Utilities Manager.
          Authors <a target="_blank" href="https://www.linkedin.com/in/gagedgibson">Gage Gibson</a>,
            <a target="_blank" href="https://www.linkedin.com/in/jaymegreer">Jayme Greer</a> and Caleb LaVergne.</p>
        </div>
      </div>

      <ul class="nav pull-right scroll-top">
        <li><a href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
      </ul>

      <div class="modal" id="myModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                 <button class="close" type="button" data-dismiss="modal">×</button>
                 <h3 class="modal-title"></h3>
             </div>
             <div class="modal-body">
               <div id="modalCarousel" class="carousel">
                 <a class="carousel-control left" href="#modaCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                 <a class="carousel-control right" href="#modalCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
               </div>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
          </div>
      </div>
    </div> <!--footer-->
  </body>
</html>
