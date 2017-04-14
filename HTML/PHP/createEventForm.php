<?php
	include '../../../dbconnect.php';
	//$eTitle = $eDesc = $roomName = $username = $sql = "";

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
				}
			}
	}
?>
