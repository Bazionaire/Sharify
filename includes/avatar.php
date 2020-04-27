<?php

    $myPhoto = "";
    if ($_SESSION["myPhoto"]!="")
    {
    	$myPhoto = $_SESSION["myPhoto"];
    }
    else
    {
    	$myPhoto = "Icons.png";
    }

    $myPhoto = "Images/".$myPhoto;

?>