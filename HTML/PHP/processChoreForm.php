<?php
ini_set("display_errors", true);
error_reporting(E_ALL);
	$cTitle = $username = $sql = "";
	$titleErr = $uidErr = "";
	$hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		$cTitle = cleanData($_POST['chore']);
			$titleErr = validate($cTitle, 'chore');
			if(!empty($titleErr)){
				$hasErrors = true;
			}//if
			else{
				/*for testing*/
				$giD = 101;
				echo "sending data";
				sendData($cTitle, $username, $giD);
			}
		$username = cleanData($_POST['choreMem']);
			$uidErr = validate($username, 'choreMem');
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

	function validate($data, $field) {
		switch($field) {
			case 'chore':{
				$data = strtolower($data);
				$data = ucfirst($data);
				$sql = "SELECT * FROM chore WHERE title = '$data'"/* AND GID = '$gid'"*/;
				$result = mysqli_query($db, $sql) /*or die("could not connect to DB")*/;

				$count = mysqli_num_rows($result);
				if($count != 0){
					return "Chore already exists";
				}
				else {
					return "";
				}
			}//case cTitle
			case 'choreMem':{
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
		}
	}

	function sendData($name, $owner, $group){
		if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
				$sql = "SELECT UID FROM user_info WHERE username = '$owner'";
				$result = mysqli_query($db, $sql);

				$count = mysqli_num_rows($result);
				if($count != 1){
					die('Error1: '.mysqli_error($db));
				}
				else{
					$uid = mysqli_fetch_row($result);
					$sql = "INSERT INTO chore (title, GID, UID) VALUES ('$name', $group, $uid)";
					$result = mysqli_query($db, $sql);

					if(!$result){
						die('Error2: '.mysqli_error($db));
					}
					else{
						echo "Chore successfully created and assigned!";
					}
				}
		}
	}
?>
