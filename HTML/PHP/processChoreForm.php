<?php
	//include '../../../dbconnect.php';
	$cTitle = $cDesc = $username = $sql = "";
	$titleErr = $descErr = $uidErr = "";
	$hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		$cTitle = cleanData($_POST['title']);
			$titleErr = validate($cTitle, 'cTitle');
			if(!empty($titleErr)){
				$hasErrors = true;
			}//if
		$cDesc = cleadData($_POST['description']);
			$descErr = validate($cDesc, 'cDesc');
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

	function validate($data, $field) {
		switch($field) {
			case 'cTitle':{
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
			case 'cDesc':{
				if(strlen($data) > 140){
					return "Description is too long.";
				}
				elseif(strlen($data) == 0){
					return "Must have some description of the chore.";
				}
				else{
					return "";
				}
			}//case cDesc
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
