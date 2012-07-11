<?php
    $voterId = $_POST["voterId"];   	
    include_once("../config/db.php");	
    
    //delete the voter 
    $stmt = $conn->exec("delete from voters where voter_id = '$voterId'");
    
?>	
