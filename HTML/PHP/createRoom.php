<?php
	include '../../../dbconnect.php';

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		
		//room attributes sent from creation page
		$rName = mysqli_real_escape_string($db, $_POST['roomName']);
		cleanData($rName);
		$rDesc = mysqli_real_escape_string($db, $_POST['description']);
		cleanData($rDesc);
		$rSize = mysqli_real_escape_string($db, $_POST['roomSize']);
		cleanData($rSize);
		
		global $gid;
		$sql = "INSERT INTO room (name, description, size, GID) VALUES ('$rName','$rDesc','$rSize','$gid')";
		$result = mysqli_query($db, $sql);

		if(!$result){
			die('Error: ' . mysqli_error());
		}//if
		else{
			echo "Room successfully created!";
		}//else
	}//if
	
	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData
?>