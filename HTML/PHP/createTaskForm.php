<?php
	include '../../../dbconnect.php';
	//$tTitle = $tDesc = $username = $sql = "";

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
			$sql = "SELECT UID FROM user_info WHERE username = '$username' And GID = '$gid'";
			$result = mysqli_query($db, $sql);

			$count = mysqli_num_rows($result);
			if($count != 1){
				die('Error: ' . mysqli_error());
			}
			else{
				$uid = mysqli_fetch_row($result);
				$uid = $uid[0];
				$sql = "INSERT INTO chore (name, description, GID, UID) VALUES ('$tTitle','$tDesc','$gid','$uid')";
				$result = mysqli_query($db, $sql);

				if(!$result){
					die('Error: ' . mysqli_error());
				}
				else{
					echo "Task successfully created and assigned!";
				}
			}
	}
?>