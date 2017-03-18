<?php
	$cid = $cName = $cDesc = $uid = "";
	$cidErr = $nameErr = $descErr = $uidErr = "";
	$hasErrors = false;
	
	if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
		$cName = cleanData($_POST['title']);
			$nameErr = validate($cName, 'cName');
			if(!empty($nameErr)){
				$hasErrors = true;			
			}
	}//if
	
	//FUNCTIONS
	function cleanData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}//cleanData
?>