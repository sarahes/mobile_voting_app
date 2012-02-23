<?php
	try 
	{
		//db connection will need to be updated when we move to to sulley
		$user = "ad060389";
		$pwd = "boerema";
		
		$conn = new PDO("mysql:host=localhost;dbname=ad060389", $user, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
	} 
	catch (PDOException $e) 
	{
		echo "Connection failed: " . $e->getMessage() . "\n";
		exit;
	}
?>