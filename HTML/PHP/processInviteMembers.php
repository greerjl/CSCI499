<?php
include '../../../dbconnect.php';
ini_set("display_errors", true);
error_reporting(E_ALL);

$memEmail = $memInviteErr = "";
$hasErrors = false;

if($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
  $memEmail = cleanData($_POST['memInvite']);
    $memInviteErr = validate($memEmail, 'memInvite');
    if(!empty($memInviteErr)) $hasErrors = true;
  include './sendGroupInvite.php';
  redirect("../houseSettings.php");
}//POST if

function cleanData($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}//cleanData

function validate($data, $field){
  switch($field){
    case 'memInvite': {
      if(!empty($data)){
        if(!filter_var($data, FILTER_VALIDATE_EMAIL)){
          return "Invalid email address.";
        }//if
      }else{
        return "Email address is required.";
      }//ifelse
      return "";
    }//case memInvite
  }
}
?>
