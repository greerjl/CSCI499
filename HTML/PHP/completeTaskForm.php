<?php
	ini_set("display_errors", true);
	error_reporting(E_ALL);
	require_once("functions.php");
	include '../../../dbconnect.php';

	$emailErr = $dbResult = "";

	if($_SERVER['REQUEST_METHOD']=='POST'){

		/*USER CREDENTIALS*/
		$taskid = mysqli_real_escape_string($GLOBALS['db'], $_POST['taskid']);

			$sql2 = "DELETE FROM task WHERE TID = '$taskid';"; //sql statement
			$result2 = mysqli_query($GLOBALS['db'], $sql2);
			if($result2 == false){
				session_start();
				$_SESSION["taskDeleteErr"] = 1;
				redirect("../welcome.php");
    	}else{
				session_start();
				$_SESSION["taskDeleteSuc"] = 1;
				redirect("../welcome.php");
			}//ifelse

	}//POST if
