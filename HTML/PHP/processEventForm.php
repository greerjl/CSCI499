<?php
session_start();
include '../../../dbconnect.php';
require_once("functions.php");
ini_set("display_errors", true);
error_reporting(E_ALL);
	$eTitle = $eTime = $eDate = $roomName = $sql = "";
	$titleErr = "";
	$hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		$gid = $_SESSION["gid"];
		$eTitle = cleanData($_POST['eventName']);
			$titleErr = validate($eTitle, 'eTitle');
			if(!empty($titleErr)){
				$hasErrors = true;
			}//if
			if(!$hasErrors){
				$eTime = $_POST['eventTime'];
				$eDate = $_POST['eventDate'];
				$roomID = $_POST['roomSelect'];
				sendData($eTitle, $eTime, $eDate, $roomID, $gid);
				redirect("../eventSettings.php");		
			}

	}//if

	//FUNCTIONS
	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData

	function validate($data, $gid) {
				$data = strtolower($data);
				$data = ucfirst($data);
				$sql = "SELECT * FROM event WHERE name = '$data' AND GID = '$gid'";
				$result = mysqli_query($GLOBALS['db'], $sql);

				$count = mysqli_num_rows($result);
				if($count != 0){
					return "Event of the same name already exists";
				}
				else {
					return "";
				}
	}//function validate

	function sendData($eTitle, $eTime, $eDate, $roomID, $gid){
				$datetime = date('Y-m-d H:i:s', strtotime("$eDate $eTime"));
				$sql = "INSERT INTO event (time, RID, name, GID) VALUES ('$datetime','$roomID','$eTitle','$gid')";
				$result = mysqli_query($GLOBALS['db'], $sql);
				if(!$result){
					die('Error: ' . mysqli_error($GLOBALS['db']));
				}//if
	}//function
?>
