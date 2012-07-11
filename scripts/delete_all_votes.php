<?php
    $voterId = $_POST["voterId"];   	
    include_once("../config/db.php");	
    
    //delete all votes
    $stmt = $conn->exec("delete from voters");
    
?>	