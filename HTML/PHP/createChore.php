<?php
	include '../../../dbconnect.php';
	//$cTitle = $cDesc = $username = $sql = "";

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
				$sql = "INSERT INTO chore (title, description, GID, UID) VALUES ('$cTitle','$cDesc','$gid','$uid')";
				$result = mysqli_query($db, $sql);

				if(!$result){
					die('Error: ' . mysqli_error());
				}
				else{
					echo "Chore successfully created and assigned!";
				}
			}
	}
?>
