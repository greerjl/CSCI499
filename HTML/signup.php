<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>HUM signup</title>
		<meta http-equiv="cache-control" content="no-cache"/>
		<link rel="stylesheet" href="../CSS/pure-min.css"/>
		<link rel="stylesheet" type="text/css" href="../CSS/normalize.css">
		<link rel="stylesheet" type="text/css" href="../CSS/signup.css"/>
		<title>HUM - signup</title>

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

		<div class="header">
        		<div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
                	<a class="pure-menu-heading" href="">Home Utilities Manager</a>

        		<ul class="pure-menu-list">
            		<li class="pure-menu-item"><a href="./login.php" class="pure-menu-link">Log-In</a></li>
            		<li class="pure-menu-item"><a href="./signup.php" class="pure-menu-link">Sign Up</a></li>
        		</ul>
		</div>
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
	 <li class="pure-menu-item"><a href="#" class="pure-menu-link">Chores</a></li>

                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Tasks</a></li>

                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Events</a></li>

                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Schedule</a></li>

                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Settings</a></li>

                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Log Out</a></li>
            </ul>
        </div>
    </div>

	<?php include 'dbconnect.php' ?>
	<?php
		echo "before first if";
    if(!empty($_POST['email']) && !empty($_POST['pswd']) && !empty($_POST['rpswd'])) {
          // username and password sent from form
			 echo "between ifs";
			 if(mysqli_real_escape_string($_POST['pswd']) == mysqli_real_escape_string($_POST['rpswd'])){
				 		echo "inner if";
          	$myusername = mysqli_real_escape_string($db,$_POST['email']);
          	$mypassword = mysqli_real_escape_string($db,$_POST['pswd']);

          	$sql = "INSERT INTO user_info (username, password) VALUES '$myusername','$mypassword';";
          	$result = mysqli_query($db,$sql);
						echo "$result";

          	$sql = "SELECT * FROM user_info WHERE username = '$myusername' and password = '$mypassword';";
          	$result = mysqli_query($db,$sql);
          	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          	$active = $row['active'];

          	$count = mysqli_num_rows($result);

          	// If result matched $myusername and $mypassword, table row must be 1 row

         		if($count == 1) {
             	//session_register("myusername");
             		//$_SESSION['login_user'] = $myusername;

             		header("location: welcome.html");
             		echo "Your Login Name and Password have been sent to database";
          	}else {
            		$error = "Your Username or Password is invalid";
    				 	echo "Your Username or Password is invalid";
          	}//ifelse
       	}
       	else{
       		$error = "Passwords Do Not Match";
    			echo "Passwords Do Not Match";
       	}
       }//if
    ?>

		<h1>HUM Sign Up Page</h1>
		<h2>All fields with an * are required</h2>

		<div class="content">
		<form id="SignUp" class="pure-form pure-form-aligned" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" />
			<fieldset>
				<legend> Sign Up </legend>
		<div class="pure-control-group">
			<label for="useremail"> Email (username): <em>*</em> </label>
			<input type="email" id="useremail" name="email" required>
		</div>
		<div class="pure-control-group">
			<label for="pw"> Password:<em>*</em> </label>
			<input type="password" id="pw" name="pswd" pattern="(?=.*\d).{6,}" placeholder="6+ chars including a number" required>
		</div> <div class="pure-control-group">
			<label for="pw"> Re-Enter Password:
			<em>*</em> </label>
			<input type="password" id="pw" name="rpswd" pattern="(?=.*\d).{6,}" required>
		</div>
			</fieldset>
			<fieldset>
				<legend> Group information - optional </legend>
			<div class="pure-control-group">
				<label for="gnameJ">Groupname to join:</label>
				<input type="text" id="gnameJ" name="groupnamejoin">
			</div>  <div class="pure-control-group">
				<label for="acode">Access Code:</label>
				<input type="text" id="acode" name="accesscode">
				<label>OR</label>
			</div>  <div class="pure-control-group">
				<label for="gnameC">Groupname to create:</label>
				<input type="text" id="gnameC" name="groupnamecreate">
			</div>  <div class="pure-control-group">
				<label for="members">Enter group members' emails:</label>
				<input class="mems" type="email" id="members" name="groupmembers">
			</div>  <div class="pure-control-group">
				<input class="mems" type="email" id="members" name="groupmembers">
			</div>  <div class="pure-control-group">
				<input class="mems" type="email" id="members" name="groupmembers">
			</div>  <div class="pure-control-group">
				<input class="mems" type="email" id="members" name="groupmembers">
			</div> <div class="pure-control-group">
				<input class="mems" type="email" id="members" name="groupmembers">
			</div>
			</div>
			</fieldset>

			<p><input type="submit" value="Sign Up"></p>

		</form>
		</div>
		<script src="./ui.js"></script>
	</body>
</html>
