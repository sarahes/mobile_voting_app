<?php
    //this fuction gets all of the candidates that are currently in the candidates table
    function getCandidates()
    {
        include('config/db.php');

        //get all of the candidates
        $c = $conn->query("select * from candidates");          
        $c->setFetchMode(PDO::FETCH_OBJ);  
                
        //populate an array of candidate names
        $candidates = array();
        while ($candidate = $c->fetch())
        {				
            array_push($candidates, $candidate->name);				
        }
                
        return $candidates;             
    }
	
    //this function gets the number of votes a candidate has
	function getCandidateVotes($name)
	{
		include('config/db.php');
		
		//get the number of votes for that candidate
		$q = $conn->prepare("select * from voters as v 
			left join candidates as c on v.candidate_id = c.id	  			 
			where c.name = :name");
		$q->bindValue(':name', $name);
		$q->execute();		
		
		$count = $q->rowCount();
		
		return $count;
	}
    
    //this function creates a link on the vote page to each candidate's individual page
    function candidateLinks()
    {
        $candidates = getCandidates();
        
        //loop through each candidate name in the candidates array
        $count = 1;
        echo "<ul data-role=\"listview\">";
        foreach($candidates as $candidateName)
        {     
            $candidateImg = $candidatePage = strtolower(preg_replace("/\s/", "", $candidateName));       
            $candidatePage = $candidateImg . "page";
            echo '<li><a href="#'. $candidatePage .'"class="candidatelink" title="Click to view this candidate" data-ajax="false"><img src="images/'.$candidateImg.'.png" />'. $candidateName .'</a></li>';		
            $count++;
        } 
        echo "</ul>";
    }       
?>