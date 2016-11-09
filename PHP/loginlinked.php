<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="cache-control" content
			="no-cache"/>
		<link rel="stylesheet" type="text/css"
			href=""/>
	</head>
	<body>
		<?php
		   include("config.php");
		   session_start();
		   
		   if($_SERVER["REQUEST_METHOD"] == "POST") {
		      // username and password sent from form 
		      
		      $myusername = mysqli_real_escape_string($db,$_POST['usnm']);
		      $mypassword = mysqli_real_escape_string($db,$_POST['pswd']); 
		      
		      $sql = "SELECT UID FROM user_info WHERE username = '$myusername' and password = '$mypassword'";
		      $result = mysqli_query($db,$sql);
		      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		      $active = $row['active'];
		      
		      $count = mysqli_num_rows($result);
		      
		      // If result matched $myusername and $mypassword, table row must be 1 row
				
		      if($count == 1) {
		         session_register("myusername");
		         $_SESSION['login_user'] = $myusername;
		         
		         header("location: welcome.html");
		      }else {
		         $error = "Your Login Name or Password is invalid";
		      }
		   }
		?>
		<header>Household Utilities Manager</header>

	<form id="LogIn" method="post" action="">
		<fieldset>
				<legend> Log In </legend>

				<label for="username"> Username: <em>*</em> </label>
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
			<p><input type="submit" value="Sign Up"></p>

		</form>
	</body>
</html>