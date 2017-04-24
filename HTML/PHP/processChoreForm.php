<?php
ini_set("display_errors", true);
error_reporting(E_ALL);
	session_start();
	require_once("functions.php");
	include '../../../dbconnect.php';
	$cTitle = $username = $sql = "";
	$titleErr = $uidErr = "";
	$hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST'){
			$giD = $_SESSION["gid"];
			$cTitle = cleanData($_POST['chore']);
			$titleErr = validate($cTitle, 'chore');
			$username = $_POST['choreOwner'];
			$uidErr = validate($username, 'choreOwner');
			if(!empty($titleErr) || !empty($uidErr)){
				$hasErrors = true;
			}//if
			else{
				/*for testing*/
				sendData($cTitle, $username, $giD);
				redirect("../choreSettings.php");
			}//ifelse

	}//if

	//FUNCTIONS
	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData

	function validate($data, $field) {
		switch($field) {
			case 'chore':{
				$data = strtolower($data);
				$data = ucfirst($data);
				$sql = "SELECT * FROM chore WHERE title = '$data' AND GID = '$giD'";
				$result = mysqli_query($GLOBALS['db'], $sql);

				$count = mysqli_num_rows($result);
				if($count != 0){
					return "Chore already exists";
				}
				else {
					return "";
				}
				return "";
			}//case cTitle

			case 'choreOwner':{
				if(empty($data)){
					return "Must select someone to do the chore.";
				}
				return "";
			}//case choreOwner
		}
	}

	function sendData($name, $owner, $group){
					$sql = "INSERT INTO chore (title, GID, UID) VALUES ('$name', $group, $owner)";
					$result = mysqli_query($GLOBALS['db'], $sql);

					if(!$result){
						die('Error: '.mysqli_error($db));
					}
					else{
						echo "Chore(s) successfully created and assigned!";
					}//ifelse

	}//function sendData
?>
