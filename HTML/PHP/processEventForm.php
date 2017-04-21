<?php
ini_set("display_errors", true);
error_reporting(E_ALL);
	$eTitle = $eDesc = $username = $roomName = $sql = "";
	$titleErr = $descErr = $roomNameErr = $uidErr = "";
	$hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		$eTitle = cleanData($_POST['title']);
			$titleErr = validate($eTitle, 'eTitle');
			if(!empty($titleErr)){
				$hasErrors = true;
			}//if
		$eDesc = cleadData($_POST['description']);
			$descErr = validate($eDesc, 'eDesc');
			if(!empty($descErr)){
				$hasErrors = true;
			}//if
		$username = cleanData($_POST['username']);
			$uidErr = validate($username, 'username');
			if(!empty($uidErr)){
				$hasErrors = true;
			}//if

		$roomName = $_POST['roomSelect'];
			$roomNameErr = validate($roomName, 'roomName');
			if(!empty($roomNameErr)){
				$hasErrors = true;
			}//if

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
			case 'eTitle':{
				$data = strtolower($data);
				$data = ucfirst($data);
				$sql = "SELECT * FROM event WHERE name = '$data'"/* AND GID = '$gid'"*/;
				$result = mysqli_query($db, $sql) /*or die("could not connect to DB")*/;

				$count = mysqli_num_rows($result);
				if($count != 0){
					return "Event of the same name already exists";
				}
				else {
					return "";
				}
			}//case eTitle
			case 'eDesc':{
				if(strlen($data) > 140){
					return "Description is too long.";
				}
				elseif(strlen($data) == 0){
					return "Must have some description of the chore.";
				}
				else{
					return "";
				}
			}//case eDesc
			case 'username':{
				$data = strtolower($data);
				$sql = "SELECT UID FROM user_info WHERE username = '$data'"/* AND GID = '$gid'"*/;
				$result = mysqli_query($db, $sql) /*or die("could not connect to DB")*/;

				$count = mysqli_num_rows($result);
				if($count == 0){
					return "User is not in your group or incorrect username";
				}
				else{
					return "";
				}
			}//case username

			case 'roomName':{
				if($data == ""){
					return "Must select a room for your event.";
				}//if
				return "";
			}//case roomName

		}//switch
	}//function validate

	function sendData(){
		if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
				$sql = "SELECT RID FROM room WHERE name = '$roomName' AND GID = '$gid'";
				$result = mysqli_query($db, $sql);

				$count = mysqli_num_rows($result);
				if($count != 1){
					die('Error: ' . mysqli_error());
				}
				else{
					$rid = mysqli_fetch_row($result);
					$rid = $rid[0];
					$sql = "INSERT INTO event (RID, name, description, GID) VALUES ('$rid','$eTitle','$eDesc','$gid')";
					$result = mysqli_query($db, $sql);

					if(!$result){
						die('Error: ' . mysqli_error());
					}
					else{
						echo "Event successfully created!";
					}//inner ifelse
				}//outer ifelse
		}//if
	}//if
?>
