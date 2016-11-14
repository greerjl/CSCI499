<!DOCTYPE html>

<!-- index.html = login.html -->

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="cache-control" content="no-cache"/>
		<link rel="stylesheet" type="text/css" href="../CSS/normalize.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/login.css"/>
		<title>HUM-login</title>
	</head>
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
