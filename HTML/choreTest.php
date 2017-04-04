<?php
	include '../../dbconnect.php';
	$sql = "SELECT username, title, description FROM user_info, chore WHERE user_info.GID = chore.GID AND user_info.UID = chore.UID";
	$result = mysqli_query($db, $sql);

	$count = mysqli_num_rows($result);

	if($count == 0){
		die('Error: ' . mysqli_error());
	}
	else{
		print "<table>";
			while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    			print "<tr>";
    			foreach ($line as $col_value) {
       			print "<td>".$col_value."</td>";
    			}
    			print "</tr>";
			}
		print "</table>";
	}
?>
