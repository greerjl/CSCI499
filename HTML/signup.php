<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>HUM signup</title>
		<meta http-equiv="cache-control" content="no-cache"/>
		<link rel="stylesheet" href="../CSS/pure-min.css"/>
		<link rel="stylesheet" type="text/css" href="../CSS/normalize.css">
		<link rel="stylesheet" type="text/css" href="../CSS/signup.css"/>
		<title>HUM-signup</title>

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
	<body>
	<div id="layout">
    	<!-- Menu toggle -->
    		<a href="#menu" id="menuLink" class="menu-link">
        	<!-- Hamburger icon -->
        		<span></span>
    		</a>

    	<div id="menu">
        	<div class="pure-menu">
            	<a class="pure-menu-heading" href="../index.html">HUM</a>

            	<ul class="pure-menu-list">
                 <li class="pure-menu-item"><a href="./login.php" class="pure-menu-link">Log In</a></li>
            	</ul>
        	</div>
    	</div>
	<?php include '../../dbconnect.php'; ?>
	<?php include './PHP/processSignupForm.php'; ?>

		<div class="content">
		  <div class="header">
			<h1> HUM Sign Up Page </header>
			<h6> All fields with an * are required </h6>
		  </div>
	<?php if($_SERVER['REQUEST_METHOD']=="GET" || $hasErrors){ ?>
		<form id="SignUp" class="pure-form pure-form-aligned" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
			<fieldset>
				<legend> Sign Up </legend>

				<label for="useremail"> Email (will be used as username): <em>*</em> </label>
				<input type="email" id="useremail" name="email" autofocus required>
				<span style="color: red"><?php print $emailErr; ?></span>
				<span style="color: red"><?php print $dbErr; ?></span>
				<br/>
				<br/>
				<label for="pw"> Password (6+ characters including 1+ numbers):
					<em>*</em> </label>
				<input type="password" id="pw" name="pswd" pattern="(?=.*\d).{6,}" required>
				<span style="color: red"><?php print $pswdErr; ?></span>
				<br/>
				<br/>
				<label for="rpw"> Re-Enter Password:
					<em>*</em> </label>
				<input type="password" id="rpw" name="rpswd" pattern="(?=.*\d).{6,}" required>
				<span style="color: red"><?php print $rpswdErr; ?></span>
				<br/>
				<br/>

			<p><input class="submit" type="submit" value="Sign Up"></p>
			</fieldset>


		</form>
		<?php }//if
			global $db;
			if($_SERVER['REQUEST_METHOD']=="POST" && !$hasErrors){
								echo "email = ".$email."; password hash = ".$hash."; email = ".$email."; \n";
          			$sql = "INSERT INTO user_info (username, password, email) VALUES ('$email','$hash', '$email')";
          			$result = mysqli_query($db, $sql);
          			echo "result =".$result."\n";
				if($result){
					$url = htmlspecialchars('successDebug.php');
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
