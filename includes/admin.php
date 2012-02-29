<?php 
	function getVoters(){
		include('config/db.php');
		
	 	$v = $conn->query("select * from voters");          
        $v->setFetchMode(PDO::FETCH_OBJ);
        
        $voters = array();
		while ($voter = $v->fetch())
        {				
        	print $voter;					
        }
        
                        
}
?>