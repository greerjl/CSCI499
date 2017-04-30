<?php
	include '../../../dbconnect.php';
	require("functions.php");
	ini_set("display_errors", true);
	error_reporting(E_ALL);

	$email = "";
	$sql = "";
	$emailErr = "";
	$hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		/*USER CREDENTIALS*/
		$email = cleanData($_POST['newMem']);
			$emailErr = validate($email, 'email');
			if(!empty($emailErr)){
				 echo "emailErr = ".$emailErr."\n";
				 $hasErrors = true;
				 //redirect("../houseSettings.php");
			}else{
				include 'sendGroupInvite.php';
				echo "no errors... maybe in send mail file";
				//redirect("../houseSettings.php");
			}//ifelse
	}//if

	//FUNCTIONS
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

?>
