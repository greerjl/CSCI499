<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>HUM signup</title>
		<meta http-equiv="cache-control" content="no-cache"/>
		<link rel="stylesheet" href="../CSS/pure-min.css"/>
		<link rel="stylesheet" type="text/css" href="../CSS/normalize.css">
		<link rel="stylesheet" type="text/css" href="../CSS/signup.css"/>
		<link rel="icon" href="../images/logo.png">

		<title>Signup</title>
		<!-- bootstrap -->
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
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

	<script>
	(function(i,s,o,g,r,a,m)
	{i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	 	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-41480445-1', 'purecss.io');
	ga('send', 'pageview');
	</script>

	</head>
	<body data-gr-c-s-loaded="true">
 	 <nav class="navbar navbar-inverse navbar-fixed-top">
 	 	<div class="container">
 	  	<div class="navbar-header">
 	    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
 	      	<span class="sr-only">Toggle navigation</span>
 	      	<span class="icon-bar"></span>
 	      	<span class="icon-bar"></span>
 	      	<span class="icon-bar"></span>
 	      </button>
 	      <a class="navbar-brand" href="../index.html"> Home Utilities Manager </a>
 	    </div>
 	    <div id="navbar" class="collapse navbar-collapse">
 	    	<ul class="nav navbar-nav">
 	      	<li class="active"><a href="../index.html">Home</a></li>
 	      </ul>
 	    </div><!--/.nav-collapse -->
 	 	</div><!--./container -->
 	 </nav>
 	 <div class="container">

 	 <div class="starter-template">
 	 	<div class="page-header">
 	  	<h1>Home Utilities Manager</h1>
 	    <h3> An application housing all your home management needs.</h2>
 	  </div><!-- /.page-header-->
	<?php include '../../dbconnect.php'; ?>
	<?php include './PHP/processSignupForm.php'; ?>

		<div class="content">
		  <div class="header">

		  </div>
	<?php if($_SERVER['REQUEST_METHOD']=="GET" || $hasErrors){ ?>
		<form id="SignUp" class="pure-form pure-form-aligned" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
			<fieldset>
				<legend> Sign Up </legend>

				<label class="sr-only" for="useremail"> Email (will be used as username): <em>*</em> </label>
				<input type="email" id="useremail" name="email" autofocus required>
				<span style="color: red"><?php print $emailErr; ?></span>
				<span style="color: red"><?php print $dbErr; ?></span>
				<br/>
				<br/>
				<label class="sr-only" for="pw"> Password (6+ characters including 1+ numbers):
					<em>*</em> </label>
				<input type="password" id="pw" name="pswd" pattern="(?=.*\d).{6,}" required>
				<span style="color: red"><?php print $pswdErr; ?></span>
				<br/>
				<br/>
				<label class="sr-only" for="rpw"> Re-Enter Password:
					<em>*</em> </label>
				<input type="password" id="rpw" name="rpswd" pattern="(?=.*\d).{6,}" required>
				<span style="color: red"><?php print $rpswdErr; ?></span>
				<br/>
				<br/>

			<p><input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign Up"></p>
			</fieldset>


		</form>
		<?php }//if
			if($_SERVER['REQUEST_METHOD']=="POST" && !$hasErrors){
								echo "username = ".$email."; password hash = ".$hash."; email = ".$email."; \n";
          			$sql = "INSERT INTO user_info (username, password, email) VALUES ('$email','$hash', '$email')";
          			$result = mysqli_query($db, $sql);
          			echo "result =".$result."\n";
				if($result){
					$url = htmlspecialchars('successfulSignup.php');
					include './PHP/emailVerify.php';
					header("Location: $url", true, 303);
					exit();
				}//if
			}//if
		?>
		Need to join/create a group? Click <a href="./signupGroup.php">here</a>.
		</div>
		<script src="./ui.js"></script>
	</body>
</html>
