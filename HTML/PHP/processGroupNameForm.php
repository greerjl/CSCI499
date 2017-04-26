<?php
session_start();
include '../../../dbconnect.php';
require_once("functions.php");
ini_set("display_errors", true);
error_reporting(E_ALL);
	$gName = $sql = "";
	$nameErr = "";
	$hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$gName = cleanData($_POST['groupName']);

			if($_SESSION["gid"]==0){
				//create random accesscode for group here
				//$acode = ;
				$sql2 = "INSERT INTO group_info (group_name) VALUES ('$gName');";
				mysqli_query($db, $sql2);
				redirect("../houseSettings.php");
			}else{
				sendData($gName, $_SESSION["gid"]);
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

	function sendData($name, $gid){
			$sql = "UPDATE group_info SET group_name = '$name' WHERE GID = '$gid'";
			$result = mysqli_query($GLOBALS['db'], $sql);

			if(!$result){
				die('Error: ' . mysqli_error($GLOBALS['db']));
			}
			else{
				//echo "Group name changed!";
			}//ifelse
	}//function sendData
?>
