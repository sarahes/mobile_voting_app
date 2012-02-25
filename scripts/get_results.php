<?php
	
	function get_results()
	{
        include_once('config/db.php');

		//get the total number of votes 
		$total = total_votes($conn);
		echo "<p>Total votes: <strong>" . $total . "</strong></p>";
		
		//get all of the candidates
		$c = $conn->query("select * from candidates");          
        $c->setFetchMode(PDO::FETCH_OBJ);  
		
		//populate an array of candidate names
		$candidates = array();
		while ($candidate = $c->fetch())
		{				
			array_push($candidates, $candidate->name);				
		}
		
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
			
			echo '<div class="candidate">';
			echo '<p>' . $candidateName . ': ' . $count . '</p>';	
			echo '</div>';
		?> 
			<div class="bar">
				<p class="graph" style="width:<?php echo $percent; ?>%">		 
					<?php echo $percent; ?>%
				</p>
			</div>
			
			 
			<div class="clear"></div>
			
		<?php
		}
		
	}
	
	function total_votes($conn)
	{
		$t = $conn->prepare("select * from voters where candidate_id != 0");		
		$t->execute();
			
		$total = $t->rowCount();
		
		return $total;
	}

?>