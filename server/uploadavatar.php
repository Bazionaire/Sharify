<?php
session_start();
require_once("../PHPMAILER/Member.php");
require_once("../PHPMAILER/DB.php");
require_once("../PHPMAILER/ExecuteQuery.php");

header("Content-Type:text/html");

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
{


    $member = new Member();
    $avatar = $member->uploadAvatar();
    $status = $avatar["status"];

    $name = $avatar["name"];
    $location = $avatar["location"];    
    echo $location;

    
    if ($status)
    {
    	 $member->updateAvatar($name,$location);    	 
    }


}	
else
{
	header("location:../Sign_IN.php");
}






?>