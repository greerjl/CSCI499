<?php
	include '../../dbconnect.php';
	$sql = "SELECT username, title, description FROM user_info, chore WHERE username = $myusername AND user_info.UID = chore.UID";
	$result = mysqli_query($db, $sql);
	
	$count = mysqli_num_rows($result);
	
	if($count != 1){
		die('Error: ' . mysqli_error());
	}
	else{
		echo "<table>\n";
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    			echo "\t<tr>\n";
    			foreach ($line as $col_value) {
       			echo "\t\t<td>$col_value</td>\n";
    			}
    			echo "\t</tr>\n";
			}
		echo "</table>\n";	
	}
?>