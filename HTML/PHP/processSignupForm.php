<?php
	include '../../../dbconnect.php';
	//ini_set("display_errors", true);
	//error_reporting(E_ALL);

	$email = $pswd = $rpswd = $username = "";
	$sql = ""; $hash = "";
	$emailErr = $pswdErr = $rpswdErr = $dbErr = "";
	$hasErrorsEmail = $hasErrorsPw = $hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){

		/*USER CREDENTIALS*/
		$email = cleanData($_POST['email']);
			$emailErr = validate($email, 'email');
			if(!empty($emailErr)) $hasErrors = true;
			$dbErr = dbCheck($email, 'email');
			if(!empty($dbErr)) $hasErrorsEmail = true;

		$username = cleanData($_POST['username']);

		$pswd = cleanData($_POST['pswd']);
			$pswdErr = validate($pswd, 'password');
			if(!empty($pswdErr)){$hasErrorsPw = true;}
			else{
					$hash = password_hash($pswd, PASSWORD_BCRYPT);
			}//else

		$rpswd = cleanData($_POST['rpswd']);
			$rpswdErr = validate2($rpswd, $pswd);
			if(!empty($rpswdErr)) $hasErrors = true;

		
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

			case 'password': {
				if(!empty($data)){
					if(!preg_match('/^(?=.*\d)(?=.*[a-zA-Z])(?!.*[\W_\x7B-\xFF]).{6,15}$/', $data)){
						return "Invalid password.";
					}//if
				}else{
					return "Must create a password.";
				}//ifelse
				return "";
			}//case pswd

			default: break;

		}//switch statement
	}//validate

	//data = rpswd, data2 = pswd
	function validate2($data, $data2){
			if(empty($data)){
				return "Please re-enter password.";
			}else{
				if(strcmp($data, $data2) !== 0){
					return "Passwords must match.";
				}//if
			}//ifelse
			return "";

	}//validate2

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
