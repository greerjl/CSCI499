<?php
	include '../../../dbconnect.php';
	require("functions.php");
	//ini_set("display_errors", true);
	//error_reporting(E_ALL);

	$email = "";
	$sql = "";
	$emailErr = "";

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		/*USER CREDENTIALS*/
		$email = $_POST['newMem'];
		$email = trim($email);
		$email = stripslashes($email);
		$email = htmlspecialchars($email);
			//$emailErr = validate($email, 'email');
			if(!empty($email)){
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				 //echo "emailErr = ".$emailErr."\n";
				 $_SESSION["inviteMemErr"]= 1;
				 redirect("../houseSettings.php");
				}else{
					include 'sendGroupInvite.php';
					$_SESSION["inviteMemSuc"] = 1;
					redirect("../houseSettings.php");
				}//inner ifelse
			}else{
				$emptyEmailError = true;
			}//outer ifelse
	}//if

?>
