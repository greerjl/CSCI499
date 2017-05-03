<?php
	//ini_set("display_errors", true);
	//error_reporting(E_ALL);
	require_once("functions.php");
	include '../../../dbconnect.php';

	$emailErr = "";

	if($_SERVER['REQUEST_METHOD']=='POST'){
		/*USER CREDENTIALS*/
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$email = cleanData($email);
		$emailErr = validate($email, 'email');

		$pswd = mysqli_real_escape_string($db, $_POST['pswd']);
		$pswd = cleanData($pswd);

		$rpswd = mysqli_real_escape_string($db, $_POST['rpswd']);
		$rpswd = cleanData($rpswd);

		//check if password = repeat password && if password meets regex
		if(strcmp($pswd, $rpswd)==0 && preg_match('/^(?=.*\d)(?=.*[a-zA-Z])(?!.*[\W_\x7B-\xFF]).{6,}$/', $pswd)==1){
			echo "in success if -> strcmp = 0 and preg_match = 0<br/>";
			$hash = password_hash($pswd, PASSWORD_BCRYPT);
			$sql = "UPDATE user_info (password) VALUES ('$hash') WHERE email='$email';";
			//if sign up credentials pass the requirements then query db to insert sql
			$result = mysqli_query($GLOBALS['db'], $sql);
			if($result == 1){
				//if user was inserted in to database start session to access errors
				session_start();
				$_SESSION["pwChangeSuccess"] = 1;
				redirect("../login.php");
			}//result if
		}//password verify if
		elseif(!strcmp($pswd, $rpswd)) {
			echo "inside !strcmp<br/>";
			//if password and repeat password don't match, set error to 1, and redirect to signup with error message
			session_start();
			$_SESSION["pwRepeatErr"] = 1;
			redirect("../newPassword.php");
		}elseif(!preg_match('/^(?=.*\d)(?=.*[a-zA-Z])(?!.*[\W_\x7B-\xFF]).{6,}$/', $pswd)){
			echo "inside !preg_match(pwsd)<br/>";
			//if password doesn't match regex, set error to 1, and redirect to signup with error message
			session_start();
			$_SESSION["pwRegexErr"] = 1;
			redirect("../newPassword.php");
		}elseif(!empty($emailErr)){
			echo "emailErr is not empty<br/>";
			//otherwise the email is Invalid
			session_start();
			$_SESSION["invalidEmailErr"] = 1;
			redirect("../newPassword.php");
		}else{
			echo "this is not good<br/>";
			session_start();
			$_SESSION["internalErr"] = 1;
			redirect("../newPassword.php");
		}

	}//POST if

	//cleanData function still used
	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData

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

			//NOT USED RIGHT NOW
			/*
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
			*/

			default: break;

		}//switch statement
	}//validate

?>
