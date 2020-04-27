<?php

session_start();
require_once("../PHPMAILER/Group.php");
require_once("../PHPMAILER/DB.php");
require_once("../PHPMAILER/ExecuteQuery.php");

header("Content-Type:text/html");

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
{

     $group = new Group();
     $result = $group->uploadGroupAvatar();

     $status = $result["status"];
     $location = $result["location"];
     $name = $result["name"];
     
     if ($status==1)
     {
          unset($_SESSION['groupimage_uploaded']);
          unset($_SESSION['groupimage_uploaded_name']);
     	$_SESSION['groupimage_uploaded'] = $location; 
          $_SESSION['groupimage_uploaded_name'] = $name;

     }
     else
     {
     	unset($_SESSION['groupimage_uploaded']);
     	unset($_SESSION['groupimage_uploaded_name']);
     }

     $response = json_encode($result);
     echo $response;
}	
else
{
	header("location:../Sign_IN.php");
}




?>