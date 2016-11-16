<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="cache-control" content="no-cache"/>
		<link rel="stylesheet" type="text/css" href="../CSS/normalize.css"/>
		<link rel="stylesheet" type="text/css" href="152.117.180.234/var/www/html/CSCI499/CSS/login.css"/>
		<title>HUM-login</title>
	</head>
  <?php
     define('DB_SERVER', '152.117.180.234:3306');
     define('DB_USERNAME', 'remote');
     define('DB_PASSWORD', 'getserved69');
     define('DB_DATABASE', 'sys');
     $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

     if(!empty($_POST['usnm'])) {
        // username and password sent from form

        $myusername = mysqli_real_escape_string($db,$_POST['usnm']);
        $mypassword = mysqli_real_escape_string($db,$_POST['pswd']);

        $sql = "SELECT * FROM user_info WHERE username = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if($count == 1) {
           //session_register("myusername");
           //$_SESSION['login_user'] = $myusername;

           header("location: index.html");
        }else {
           $error = "Your Login Name or Password is invalid";
  				 echo "Your Login Name or Password is invalid";
        }
     }
  ?>
	<body>
		<header>Household Utilities Manager</header>
		<div class="intro">
			HUM is ...
		</div>

		<form id="LogIn" method="post" action="">
			<fieldset>
				<legend> Log In </legend>

				<label for="username"> User name: <em>*</em> </label>
				<input type="text" id="username" name="usnm" autofocus required>
				<br/>
				<br/>
				<label for="password"> Password: (Must contain 6 or more characters and at least one number)
					<em>*</em>
				</label>
				<input type="password" id="password" name="pswd" pattern="(?=.*\d).{6,}"required>
				<br/>
				<br/>
			</fieldset>

			<p><input type="submit" value="Log In"></p>

		</form>

		<div class="signup">
			Don't have an account?
			<a href="./signup.php"> Sign up </a>
		</div>

	</body>
</html>
