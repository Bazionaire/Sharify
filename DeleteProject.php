<?php
require_once("PHPMAILER/Config.php");

if (!isset($_GET['id']) || $_GET['id']=='')
{
	header("location:ManageProject.php");
}
$projectid = $_GET['id'];
$project = new Project();
$project->deleteProject($projectid);
header("location:ManageProject.php");

?>