<?php

class ExecuteQuery
{
	public static function customQuery($sqlQuery)
	{

	    $mysql = new DB();
		$conn =  $mysql->connect();			
		$result = $conn->query($sqlQuery);
		
		$conn->close();
		return $result;
		$result->close();
		

	}
}
	




?>