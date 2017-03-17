<?php
	$url = htmlspecialchars('./welcome.php');
	header("Location: $url", true, 303);
	exit();
?>
