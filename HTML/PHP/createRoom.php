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
		$roomArr = array($rName1, $rName2,$rName3,$rName4);

		foreach($roomArr as &$room){
			if(!empty($room)){
					$sql = "INSERT INTO room (name, GID) VALUES ('$room','$gid')";
					$result = mysqli_query($db, $sql);

					if(!$result){
						die('Error: ' . mysqli_error());
					}//if
					else{
						echo "Room successfully created!";
					}//else
			}//if
		}//foreach
		unset($room);

	}//if

	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData
?>
