<?php
	include '../../../dbconnect.php';
	ini_set("display_errors", true);
	error_reporting(E_ALL);

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){

		//room attributes sent from creation page
		$rName1 = mysqli_real_escape_string($db, $_POST['room1']);
		cleanData($rName1);
		$rName2 = mysqli_real_escape_string($db, $_POST['room2']);
		cleanData($rName2);
		$rName3 = mysqli_real_escape_string($db, $_POST['room3']);
		cleanData($rName3);
		$rName4 = mysqli_real_escape_string($db, $_POST['room4']);
		cleanData($rName4);

		$gid = 103;
		$roomArr = array($rName1, $rName2,$rName3,$rName4);
		foreach($roomArr as &$room){
			if(!empty($room)){
					$sql = "INSERT INTO room (name, GID) VALUES ('$room', $gid)";
					$result = mysqli_query($db, $sql);
					if(!$result){
						die('Error: ' . mysqli_error($db). ' Error: '. mysqli_errno($db));
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
