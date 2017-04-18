<?php
ini_set("display_errors", true);
error_reporting(E_ALL);	$tTitle = $username = $sql = "";
	$titleErr = $uidErr = "";
	$hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		$tTitle = cleanData($_POST['title']);
			$titleErr = validate($tTitle, 'tTitle');
			if(!empty($titleErr)){
				$hasErrors = true;
			}//if
		$username = cleanData($_POST['username']);
			$uidErr = validate($username, 'username');
			if(!empty($uidErr)){
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

	function validate($data, $field) {//, $gid
		switch($field) {
			case 'tTitle':{
				$data = strtolower($data);
				$data = ucfirst($data);
				$sql = "SELECT * FROM task WHERE name = '$data'"/* AND GID = '$gid'"*/;
				$result = mysqli_query($db, $sql) /*or die("could not connect to DB")*/;

				$count = mysqli_num_rows($result);
				if($count != 0){
					return "Task of the same name already exists";
				}
				else {
					return "";
				}
			}//case eTitle
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
		}//switch
	}//function validate

	function sendData($task, $group){
		if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
					$sql = "INSERT INTO task (name, GID) VALUES ('$task','$gid')";
					$result = mysqli_query($db, $sql);

					if(!$result){
						die('Error: ' . mysqli_error());
					}
					else{
						echo "Task successfully created and assigned!";
					}//ifelse
		}//if
	}//function sendData
?>
