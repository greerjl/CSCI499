<?php
	//ini_set("display_errors", true);
	//error_reporting(E_ALL);
	require_once("functions.php");
	include '../../../dbconnect.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){

		/*USER CREDENTIALS*/
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$email = cleanData($email);

		$username = mysqli_real_escape_string($db, $_POST['username']);
		$username = cleanData($username);

		$pswd = mysqli_real_escape_string($db, $_POST['pswd']);
		$pswd = cleanData($pswd);

		$rpswd = mysqli_real_escape_string($db, $_POST['rpswd']);
		$rpswd = cleanData($rpswd);

		//check if password = repeat password && if password meets regex && if email exists in database
		if($password_verify($pswd, $rpswd) && preg_match('/^(?=.*\d)(?=.*[a-zA-Z])(?!.*[\W_\x7B-\xFF]).{6,15}$/', $pswd) && dbCheck($email)){
			$accesskey = uniqid();
			$sql = "INSERT INTO user_info (username, password, email, accesskey) VALUES ('$username','$hash', '$email', '$accesskey')";
			//if sign up credentials pass the requirements then query db to insert sql
			$result = mysqli_query($db, $sql);
			if($result == 1){
				//if user was inserted in to database start session to access errors
				session_start();
				$_SESSION["signupRepeatEmailErr"] = 0;
				$_SESSION["signupRepeatPswdErr"] = 0;
				$_SESSION["signupRegexErr"] = 0;
				//include mailer script to send user an email for verification
				include './PHP/sendUserConfirmMail.php';
				//redirect to sign up and display success message
				redirect("../signup.php");
			}//result if
		}//password verify if
		else if(!($password_verify($pswd, $rpswd))) {
			//if password and repeat password don't match, set error to 1, and redirect to signup with error message
			session_start();
			$_SESSION["signupRepeatPswdErr"] = 1;
			redirect("../signup.php");
		} else if(!preg_match('/^(?=.*\d)(?=.*[a-zA-Z])(?!.*[\W_\x7B-\xFF]).{6,15}$/', $pswd)){
			//if password doesn't match regex, set error to 1, and redirect to signup with error message
			session_start();
			$_SESSION["signupRegexErr"] = 1;
			redirect("../signup.php");
		}//if
		else {
		// should catch if email has been used to sign up already, set error to 1, and redirect to signup with error message
			session_start();
			$_SESSION["signupRepeatEmailErr"] = 1;
			redirect("../signup.php");
		}

	}//POST if

	//cleanData function still used
	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData

	//dbCheck function still used
	function dbCheck($data){
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

	}//function dbCheck

	//UNUSED FUNCTIONS BELOW
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

?>
