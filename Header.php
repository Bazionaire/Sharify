<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
   
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sharify - <?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Muli|Nunito|PT+Sans|Source+Sans+Pro|Ubuntu|Pacifico" rel="stylesheet">

  </head>
  <body>
  <?php
  if (isset($_SESSION['memberLogin']) && $_SESSION['memberLogin'] == 'Baz' && $_SESSION['myRole']=='admin')
  {
     require_once("AdminHeader.php");
  }
  else if (isset($_SESSION['memberLogin']) && $_SESSION['memberLogin'] == 'Baz' && $_SESSION['myRole']=='teamleader')
  {
     require_once("LeaderHeader.php");
  }else if (isset($_SESSION['memberLogin']) && $_SESSION['memberLogin'] == 'Baz' && $_SESSION['myRole']=='member')
  {
      require_once("StudentHeader.php");
  }
  ?>