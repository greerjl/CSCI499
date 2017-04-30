<?php
ini_set("display_errors", true);
error_reporting(E_ALL);
	session_start();
	require_once("functions.php");
	include '../../../dbconnect.php';
 	$sql = "";
	$cErr = "";
	$hasErrors = false;

	if($_SERVER['REQUEST_METHOD']=='POST'){
			$cid = $_POST['choreList'];
			if($cid != ""){
				$cErr = remove($cid);
				if(!empty($cErr)){
					$hasErrors = true;
				}
			}//if
			redirect("../choreSettings.php");
	}//if

	//FUNCTIONS
	function remove($data) {
				$sql = "DELETE FROM chore WHERE CID = '$data';";
				$result = mysqli_query($GLOBALS['db'], $sql);

				if($result){
						return "Chore successfully deleted!";
				}
				return "Nope.";
	}//function remove

?>
