<?php
	require_once('../../../dbconnect.php');

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){

		//room attributes sent from creation page
		$rName1 = mysqli_real_escape_string($db, $_POST['roomName']);
		cleanData($rName1);
		$rName2 = mysqli_real_escape_string($db, $_POST['roomName']);
		cleanData($rName2);
		$rName3 = mysqli_real_escape_string($db, $_POST['roomName']);
		cleanData($rName3);
		$rName4 = mysqli_real_escape_string($db, $_POST['roomName']);
		cleanData($rName4);

		$gid = 101;
		$roomArr = {$rName1, $rName2,$rName3,$rName4};
		foreach($roomArr as &$room){
			$sql = "INSERT INTO room (name, description, size, GID) VALUES ('$room','$gid')";
			$result = mysqli_query($db, $sql);

			if(!$result){
				die('Error: ' . mysqli_error());
			}//if
			else{
				echo "Room successfully created!";
			}//else
		}
		unset($room);

	}//if

	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData
?>
