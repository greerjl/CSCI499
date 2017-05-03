<!DOCTYPE html>
<?php session_start();
require_once("./PHP/functions.php");
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>HUM signup</title>
		<meta http-equiv="cache-control" content="no-cache"/>
		<link rel="stylesheet" href="../CSS/pure-min.css"/>
		<link rel="stylesheet" type="text/css" href="../CSS/normalize.css">
		<link rel="stylesheet" type="text/css" href="../CSS/signup.css"/>
		<link rel="icon" href="../images/logo.png"/>
		<link rel="stylesheet" type="text/css" href="../CSS/psuedoWelcome.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<title>HUM Signup</title>
		<!-- bootstrap -->
		<link href="../bootstrap/css/starter-template.css" rel="stylesheet">
		<link href="../bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">
		<link href="../bootstrap/css/signin.css" rel="stylesheet">

		<!--[if lte IE 8]>
		<link rel="stylesheet" href="/combo/1.18.13?/css/layouts/side-menu-old-ie.css">
	    <![endif]-->
    	<!--[if gt IE 8]><!-->
    	<!--<![endif]-->
	<!--[if lt IE 9]>
    	<script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
	 <![endif]-->

	</head>

<body>
	<div id="layout">
    <div id="main">

      <div class="header">
        <h1>House Utilities Manager</h1>
        <h2>An application for all your home management needs. </h2>
      </div>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
						<a class="navbar-brand" href="../index.html">House Utilities Manager</a>
				</div>
				<div class="collapse navbar-collapse" id="mainNavBar">
					<ul class="nav navbar-nav">
						<li><a href="./login.php">Log In</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">        </script>

	<div class="container">


	<?php include '../../dbconnect.php'; ?>
	<?php include './PHP/processForgotPwForm.php';?>
	<?php if($_SESSION["userDNE"] == 1){ ?>
		<div class="alert alert-danger">
			<strong>Error!</strong> User does not exist.
		</div>
	<?php $_SESSION["userDNE"] = 0; }//if
			elseif($_SESSION["internalErr"] == 1){ ?>
				<div class="alert alert-danger">
					<strong>Error!</strong> User does not exist.
				</div>
			<?php $_SESSION["internalErr"] = 0; } ?>
				<div class="content">
						 <form id="SignUp" class="form-signin" method="POST" action="./PHP/processForgotPwForm.php">
						 <h2 class="form-signin-heading"> Forgot Password? </h2>

						 <input type="email" id="useremail" class="form-control"
						 		name="email" placeholder="Email Address" autofocus required/>

						 <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
	 			 	</form>
			 </div><!-- /.content -->
	 </div> <!-- /.container -->
 	</div><!--main-->
 </div><!--layout-->
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
