<?php
	$voterId = $_POST["voterId"];   	
	include_once("../config/db.php");
	
	mail('ssheehan131@gmail.com', $voterId, 'teststt');
    //delete the voter 
	$stmt = $conn->exec("delete from voters where voter_id = :voterId");
	$stmt->bindValue(':voterId', $voterId);
	$stmt->execute();
	
	$deleteSuccess = true;	
	echo json_encode(array('voterId' => $voterId, 'deleteSuccess' => $deleteSuccess));
        
?>	
