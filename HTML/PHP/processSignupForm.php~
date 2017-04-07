<?php
	//include '../../../dbconnect.php';

	$email = $pswd = $rpswd = $groupnameJ = $accesscode = $groupnameC = $mems = "";
	$sql = "";
	$emailErr = $pswdErr = $rpswdErr = $dbErr = $groupnameCErr = $dbgnameJErr = $dbgnameCErr = $dbaccesscodeErr = $memsErr = "";
	$hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){

		/*USER CREDENTIALS*/
		$email = cleanData($_POST['email']);
			$emailErr = validate($email, 'email');
			if(!empty($emailErr)) $hasErrors = true;
			$dbErr = dbCheck($email, 'email');
			if(!empty($dbErr)) $hasErrors = true;

		$pswd = cleanData($_POST['pswd']);
			$pswdErr = validate($pswd, 'password');
			if(!empty($pswdErr)) $hasErrors = true;

		$rpswd = cleanData($_POST['rpswd']);
			$rpswdErr = validate2($rpswd, $pswd);
			if(!empty($rpswdErr)) $hasErrors = true;
			
		//hashing function ** need to make sure this is being saved to DB			
		//$hash = password_hash($pswd, PASSWORD_DEFAULT)."\n";

		/*GROUP CREDENTIALS*/
		$groupnameJ = cleanData($_POST['groupnameJ']);
			$dbgnameJErr = dbCheck($groupnameJ, 'groupname');
			if(!empty($dbgnameErr)) $hasErrors = true;

		$accesscode = cleanData($_POST['accesscode']);
			$dbaccesscodeErr = dbCheck($accesscode, 'accesscode');
			if(!empty($dbaccesscodeErr)) $hasErrors = true;

		$groupnameC = cleanData($_POST['groupnameC']);
			$groupnameCErr = validate($groupnameC, 'groupnameC');
			if(!empty($groupnameCErr)) $hasErrors = true;
			$dbgnameCErr = dbCheck($groupnameC, 'groupnameC');
			if(!empty($groupnameCErr)) $hasErrors = true;

		$mems = cleanData($_POST['mems']);
			$memsErr = validate($mems, 'memsemail');
			if(!empty($memsErr)) $hasErrors = true;

	}//if

	//FUNCTIONS
	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData

	function validate($data, $field){
		switch($field){
			case 'email': {
				if(!empty($data)){
					if(!filter_var($data, FILTER_VALIDATE_EMAIL)){
						return "Invalid email address.";
					}//if
				}else{
					return "Email address is required.";
				}//ifelse
				return "";
			}//case email

			case 'password': {
				if(!empty($data)){
					if(!preg_match('/^(?=.*\d)(?=.*[a-zA-Z])(?!.*[\W_\x7B-\xFF]).{6,15}$/', $data)){
						return "Invalid password.";
					}//if
				}else{
					return "Must create a password.";
				}//ifelse
				return "";
			}//case pswd

			case 'groupnameC': {
				if(!empty($data)){
					if(!preg_match('^.{6,30}$', $data)){
						return "Name must be 6-30 characters.";
					}//if
				}
				return "";
			}//case groupnameC

			case 'memsemail': {
				if(!empty($data)){
					if(!filter_var($data, FILTER_VALIDATE_EMAIL)){
						return "Invalid email address.";
					}//if
				}//if
				return "";
			}//case memsemail

			default: break;

		}//switch statement
	}//validate

	//data = rpswd, data2 = pswd
	function validate2($data, $data2){
			if(empty($data)){
				return "Please reenter password.";
			}else{
				if(strcmp($data, $data2) !== 0){
					return "Passwords must match.";
				}//if
			}//ifelse
			return "";

	}//validate2

/*EVEN IF NEW EMAIL (MAYBE GNAME) IS ENTERED, ERROR RETURNED SAYING ALREADY EXISTS*/
	function dbCheck($data, $field){
		switch($field){
			case 'email': {
				$sql = "SELECT * FROM user_info WHERE email = '$data'";

				$result = mysqli_query($db, $sql);
				$count = mysqli_num_rows($result);
				if($count != 0){
					return "This email has already been registered.";
				}//if
					return "";
			}//case email

			/*case 'username': {
				$sql = "SELECT * FROM user_info WHERE username = '$data'";
				$result = mysqli_query($db, $sql);

				$count = mysqli_num_rows($result);
				if($count == 1){
					return "This username has already been registered."
				}//if
			}//case username
			*/

			case 'groupnameC': {
				$sql = "SELECT * FROM group_info WHERE group_name = '$groupnameC'";

				$result = mysqli_query($db, $sql);
				$count = mysqli_num_rows($result);
				if(!empty($groupnameC)){
					if($count != 0){
						return "This group name already exists.";
					}//if
				}//if
				return "";

			}//case groupnameJ

			case 'groupnameJ': {
				$sql = "SELECT * FROM group_info WHERE group_name = '$groupnameJ'";

				$result = mysqli_query($db, $sql);
				$count = mysqli_num_rows($result);
				if(!empty($groupnameJ)){
					if($count == 0){
						return "This group does not exist.";
					}//if
				}//if
				return "";

			}//case groupnameJ

		}//switch
	}//function dbCheck

?>
