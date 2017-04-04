<?php
	//include '../dbconnect.php';
	$tTitle = $tDesc = $username = $sql = "";
	$titleErr = $descErr = $uidErr = "";
	$hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		$tTitle = cleanData($_POST['title']);
			$titleErr = validate($tTitle, 'tTitle');
			if(!empty($titleErr)){
				$hasErrors = true;
			}//if
		$tDesc = cleadData($_POST['description']);
			$descErr = validate($tDesc, 'tDesc');
			if(!empty($descErr)){
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
			case 'tDesc':{
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
		}
	}
?>
