<?php
	session_start();
	
	$voterId = $_POST["voterId"];
	$name = $_POST["name"];
	$alreadyVoted = false;
	
	include_once("../config/db.php");	
	
	//validate that voterId is a number between 1001 and 1049
	if(is_numeric($voterId) && (1001 < $voterId && $voterId < 1049))
	{
		$_SESSION['logged'] = true;	
		
		//check if a record for current voterId already exists in voters table
		$q = $conn->prepare("select * from voters where voter_id = :voterId");
		$q->bindValue(':voterId', $voterId);
		$q->execute();
	
		//if the voterId already exists
		if($q->rowCount() > 0)
		{
			//the user already voted, send them to the results page			
			$alreadyVoted = true;
		}
		//voterId does not exist in db, this is a new voter
		else
		{			
			unset($q); //unset the select query above
			$stmt = $conn->prepare("insert into voters values (:voterId, :name, '')");
			$stmt->bindValue(':voterId', $voterId);
			$stmt->bindValue(':name', $name);
			$stmt->execute(); 	

		}
	}
	else 
	{	
		$_SESSION['logged'] = false;
		$voterId = false;	
	}
	echo json_encode(array('voterId' => $voterId, 'name' => $name, 'alreadyVoted' => $alreadyVoted));

?>