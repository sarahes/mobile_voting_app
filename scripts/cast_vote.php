<?php
	$voterId = $_POST["voterId"];
	$candidateId = $_POST["candidateId"];
	include_once("../config/db.php");	
		
	//update the voter table with the correct candidate id	
	$stmt = $conn->prepare("update voters set candidate_id = :candidateId where voter_id = :voterId");
	$stmt->bindValue(':voterId', $voterId);
	$stmt->bindValue(':candidateId', $candidateId);
	$stmt->execute();

	//vote successfully cast, forward voter to results page
	header("Location: ../results.php");
?>