<?php
    function getCandidates()
    {
        include_once('config/db.php');

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
        $count = 1;
        foreach($candidates as $candidateName)
        {	
            echo '<p><a href="" id='. $candidateName .'class="candidateLink" title="Click to view this candidate" />'. $candidateName .'</a></p>';		
            $count++;
        }
    }
?>