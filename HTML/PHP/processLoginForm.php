<?php
	$hasErrors = false;
	$flag = 0;


	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//username and password sent from form
		$myusername = mysqli_real_escape_string($db, $_POST['usnm']);
		cleanData($myusername);
		$mypassword = mysqli_real_escape_string($db, $_POST['pswd']);
		cleanData($mypassword);

		$sql = "SELECT UID FROM user_info WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$active = $row['active'];

		$count = mysqli_num_rows($result);

		//if result matched $myusername and $mypassword, table row must be 1 row
		//echo 'flag before if in processLogin = '.$flag."<br/>";
		if($count == 1){

			$_SESSION['login_user'] = $myusername;
	    $_SESSION['valid'] = true;
	    $_SESSION['timeout'] = time() + 300;
			session_start();

			$flag = 1;
			//echo 'flag after if in processLogin = '.$flag."<br/>";

		}else{
			$flag = 0;
			$hasErrors = true;
		}//ifelse
	}//POST if

	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData
?>
