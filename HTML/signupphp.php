<?php 
    if(!empty($_POST['email']) && !empty($_POST['pswd']) && !empty($_POST['rpswd'])) {
          // username and password sent from form
			 if(mysqli_real_escape_string($_POST['pswd']) == mysqli_real_escape_string($_POST['rpswd'])){
          	$myusername = mysqli_real_escape_string($db,$_POST['email']);
          	$mypassword = mysqli_real_escape_string($db,$_POST['pswd']);

          	$sql = "INSERT INTO user_info (username, password) VALUES '$myusername','$mypassword'";
          	$result = mysqli_query($db,$sql);

          	$sql = "SELECT * FROM user_info WHERE username = '$myusername' and password = '$mypassword'";
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
