<?php
	ini_set("display_errors", true);
	error_reporting(E_ALL);
	require_once("functions.php");
	$hasErrors = false;
	$flag = 0;

	include "../../../dbconnect.php";

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		//username and password sent from form
		$myusername = mysqli_real_escape_string($db, $_POST['usnm']);
		cleanData($myusername);
		$mypassword = mysqli_real_escape_string($db, $_POST['pswd']);
		cleanData($mypassword);

		//Password hash functions
		$hash = password_hash($mypassword, PASSWORD_DEFAULT)."\n";

		//Database queries
		$sql = "SELECT UID FROM user_info WHERE username = '$myusername' and password = '$hash'";
		$sqlPswd = "SELECT password FROM user_info WHERE username= '$myusername'";
		$pwsdResult = mysqli_query($db, $sqlPswd);

		$result = mysqli_query($db, $sql);
		//** line not necessary $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);

		//if statement to allow login and start session if account exists and password is correct
		if (password_verify($pwsdResult[0], $hash) && $count == 1) {
    			session_start();
					$_SESSION["login_user"] = $myusername;
	    			$_SESSION["valid"] = true;
	    			$_SESSION["timeout"] = time() + 300;

					$flag = 1;
					redirect("../welcome.php");
		} else {
			$flag = 0;
			$hasErrors = true;
			redirect("../login.php");
		}//ifelse
	}//POST if

	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData
?>
