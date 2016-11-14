<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>HUM signup</title>
		<meta http-equiv="cache-control" content="no-cache"/>
		<link rel="stylesheet" type="text/css" href="../CSS/normalize.css">
		<link rel="stylesheet" type="text/css" href="../CSS/signup.css"/>
	</head>
	<body>
		<header>HUM Sign Up Page</header>
		<h6>All fields with an * are required</h6>

		<form id="SignUp" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" />
			<fieldset>
				<legend> Sign Up </legend>

				<label for="username"> Username: <em>*</em> </label>
				<input type="text" id="username" name="uname" autofocus required>
				<br/>
				<br/>
				<label for="useremail"> Email (will be used as username): <em>*</em> </label>
				<input type="email" id="useremail" name="email" required>
				<br/>
				<br/>
				<label for="pw"> Password: (Must contain 6 or more characters and at least one number)
					<em>*</em> </label>
				<input type="password" id="pw" name="pswd" pattern="(?=.*\d).{6,}" required>
				<br/>
				<br/>
			</fieldset>
			<fieldset>
				<legend> Group information - optional </legend>

				<label for="gnameJ">Groupname to join:</label>
				<input type="text" id="gnameJ" name="groupnamejoin">
				<br/>
				<label for="acode">Access Code:</label>
				<input type="text" id="acode" name="accesscode">
				<br/>
				<br/>
				<br/>
				<label for="gnameC">Groupname to create:</label>
				<input type="text" id="gnameC" name="groupnamecreate">
				<br/>
				<label for="members">Enter group members' emails:</label>
				<input class="mems" type="email" id="members" name="groupmembers">
				<input class="mems" type="email" id="members" name="groupmembers">
				<input class="mems" type="email" id="members" name="groupmembers">
				<input class="mems" type="email" id="members" name="groupmembers">
				<input class="mems" type="email" id="members" name="groupmembers">
				<br/>
				<br/>

			</fieldset>

			<p><input type="submit" value="Sign Up"></p>

		</form>
	</body>
</html>
