<?php
	include '../../../dbconnect.php';
	require("functions.php");
	ini_set("display_errors", true);
	error_reporting(E_ALL);

	$email = "";
	$sql = "";
	$emailErr = "";
	$hasEmailErrors = $emptyEmailError = false;

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
				 $hasEmailErrors = true;
				 redirect("../houseSettings.php");
				}else{
					include 'sendGroupInvite.php';
					redirect("../houseSettings.php");
				}//inner ifelse
			}else{
				$emptyEmailError = true;
			}//outer ifelse
	}//if

	//FUNCTIONS
/*
	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData

	function validate($data, $field){
		switch($field){
			case 'email': {
				if(!empty($data)){
					if(!filter_var($data, FILTER_VALIDATE_EMAIL)){
						return "Invalid email address.";
					}//if
				}else{
					return "Email address is required.";
				}//ifelse
				return "";
			}//case email

			default: break;

		}//switch statement
	}//validate
*/

?>
