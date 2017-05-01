<?php
//ini_set("display_errors", true);
//error_reporting(E_ALL);
session_start();

include '../../../dbconnect.php';
require("functions.php");
	$roomName = $sql = "";
	$roomErr = "";

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		$_SESSION["roomErr"] = 0;
		$roomName = $_POST['room1'];
		$roomName = cleanData($GLOBALS['db'], $roomName);
		$roomErr = validate($roomName, 'room1', $_SESSION["gid"], $GLOBALS['db']);
			if(empty($roomName)){
				$_SESSION["roomErr"] = 1;
			}else{
				$_SESSION["roomSuc"] = 1;
				sendData($roomName, $_SESSION["gid"]);
			}
			redirect("../houseSettings.php");
	}//if

	//FUNCTIONS
	function cleanData($db, $data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = mysqli_real_escape_string($db, $data);
		return $data;
	}//cleanData

	function validate($data, $field, $gid, $db1) {
		switch($field) {
			case 'room1':{
				$data = strtolower($data);
				$data = ucfirst($data);
				$sql = "SELECT * FROM room WHERE name = '$data' AND GID = '$gid'";
				$result = mysqli_query($db1, $sql);

				$count = mysqli_num_rows($result);
				if($count != 0){
					return "Room already exists";
					$_SESSION["dupRoom"] = 1;
				}//if
				return "";
			}//case room1

		}//switch
	}//function validate

	function sendData($name, $group){
		if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
      $sql = "INSERT INTO room (name, GID) VALUES ('$name', '$group')";
      $result = mysqli_query($GLOBALS['db'], $sql);
      if(!$result){
        die('Error: ' . mysqli_error($db). ' Error: '. mysqli_errno($db));
      }//if
      else{
        echo "Room(s) successfully created!";
      }//else
		}//if
	}//function sendData
?>
