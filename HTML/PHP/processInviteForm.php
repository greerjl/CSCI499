<?php
	include '../../../dbconnect.php';
	require("functions.php");
	//ini_set("display_errors", true);
	//error_reporting(E_ALL);

	$email = "";
	$sql = "";
	$emailErr = $dbErr = "";
	$hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){

		/*USER CREDENTIALS*/
		$email = cleanData($_POST['newMem']);
			$emailErr = validate($email, 'email');
			$dbErr = dbCheck($email, 'email');
			if(!empty($emailErr) && !empty($dbErr)){
				 $hasErrors = true;
				 redirect("../houseSettings.php");
			}else{
				include 'sendGroupInvite.php';
				redirect("../houseSettings.php");
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

	function dbCheck($data, $field){
		switch($field){
			case 'email': {
				$sql = "SELECT email FROM user_info WHERE email = '$data'";

				$result = mysqli_query($GLOBALS['db'], $sql);
				$count = mysqli_num_rows($result);

				if(!$result || mysqli_num_rows($result) != 0){
					return "This email has already been registered.";
				}//if
				else{
					return "";
				}//ifelse
				return "";
			}//case email

		}//switch
	}//function dbCheck

?>
