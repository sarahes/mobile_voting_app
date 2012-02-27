<?php 
	function getResults()
	{ 
        include('../config/db.php');
        
		$total = totalVotes($conn);
		
		//get all of the candidates
		$c = $conn->query("select * from candidates");          
        $c->setFetchMode(PDO::FETCH_OBJ);  
		
		//populate an array of candidate names
		$candidates = array();
		while ($candidate = $c->fetch())
		{				
			array_push($candidates, $candidate->name);				
		}
		
        echo "<ul data-role=\"listview\">";
		//loop through each candidate name in the candidates array
		foreach($candidates as $candidateName)
		{	
			//get the number of votes for that candidate
			$q = $conn->prepare("select * from voters as v 
				left join candidates as c on v.candidate_id = c.id	  			 
				where c.name = :candidateName");
			$q->bindValue(':candidateName', $candidateName);
			$q->execute();
			
			$count = $q->rowCount();
			$percent = round(($count / $total) * 100);
			
			$candidateImg = strtolower(preg_replace("/\s/", "", $candidateName));
            
		?> 			
				
			<li> 
				<img src="images/<?php echo $candidateImg ?>.jpg" alt="<?php echo $candidateName ?>" />
				<div class="candidateCount"><?php echo $candidateName . ': ' . $count ?></div>
				<div class="bar">
				<p class="graph" style="width:<?php echo $percent; ?>%">
					<?php echo $percent; ?>%
				</p>
				</div>
			</li>	
			
		<?php        
		}
        echo "</ul>";
		
	}
	
	function totalVotes($conn)
	{
        //get the total number of votes for all candidates
		$t = $conn->prepare("select * from voters where candidate_id != 0");		
		$t->execute();
			
		$total = $t->rowCount();
		
		return $total;
	}
   
    getResults();
?>