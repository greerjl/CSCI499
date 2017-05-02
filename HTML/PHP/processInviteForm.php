<?php
	include '../../../dbconnect.php';
	require("functions.php");
	ini_set("display_errors", true);
	error_reporting(E_ALL);

	$email = $username = "";
	$sql = "";
	$emailErr = "";

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		/*USER CREDENTIALS*/
		$username = $_POST['uname'];
		$username = trim($username);
		$username = stripslashes($username);
		$username = htmlspecialchars($username);

		$email = $_POST['newMem'];
		$email = trim($email);
		$email = stripslashes($email);
		$email = htmlspecialchars($email);
			//$emailErr = validate($email, 'email');
			if(!empty($email) && !empty($username)){
				if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
					session_start();
				 //echo "emailErr = ".$emailErr."\n";
				 $_SESSION["inviteMemErr"]= 1;
				 redirect("../houseSettings.php");
				}else{
					session_start();
					include 'sendGroupInvite.php';
					$_SESSION["inviteMemSuc"] = 1;
					redirect("../houseSettings.php");
				}//inner ifelse
			}else{
				session_start();
				$_SESSION["emptyEmailErr"] = 1;
			}//outer ifelse
	}//if

?>
