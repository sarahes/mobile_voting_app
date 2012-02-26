<?php
	$voterId = $_POST["voterId"];
	$candidateId = $_POST["candidateId"];
	include_once("../config/db.php");	
		
	//update the voter table with the correct candidate id	
	$stmt = $conn->prepare("update voters set candidate_id = :candidateId where voter_id = :voterId");
	$stmt->bindValue(':voterId', $voterId);
	$stmt->bindValue(':candidateId', $candidateId);
	$stmt->execute();

    //Get rid of the voterId cookie
    setcookie("voterId","",time()-3600); 
    
	//vote successfully cast, forward voter to results page
	echo json_encode(array('voterId' => $voterId, 'candidateId' => $candidateId));
?>