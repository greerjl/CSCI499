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
			$nameErr = validate($gName);
			if(!empty($nameErr)){
				$hasErrors = true;
			}//if
		if(!$hasErrors){
			sendData($gName, $_SESSION["gid"]);
			//redirect("../houseSettings.php");
		}
		else{
			echo $titleErr." ";
			//redirect("../houseSettings.php");
		}
	}//if

	//FUNCTIONS
	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData

	function validate($data) {
			$gid = $_SESSION["gid"];
			if($gid == 0){
				return "You are not in a group.";
			}
			else{
				return "";
			}
			return "Error: check value of $gid.";
	}//function validate

	function sendData($name, $gid){
			$sql = "UPDATE group_info SET group_name = '$name' WHERE GID = '$gid'";
			$result = mysqli_query($GLOBALS['db'], $sql);

			if(!$result){
				die('Error: ' . mysqli_error($GLOBALS['db']));
			}
			else{
				echo "Group name changed!";
			}//ifelse
	}//function sendData
?>
