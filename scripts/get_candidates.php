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
    
    //this function creates a link on the vote page to each candidate's individual page
    function candidateLinks()
    {
        $candidates = getCandidates();
        
        //loop through each candidate name in the candidates array
        $count = 1;
        foreach($candidates as $candidateName)
        {	
            $candidateIdName = "show".strtolower(preg_replace("/\s/", "", $candidateName));
            
            echo '<p><a href="" id="'. $candidateIdName .'"class="candidatelink" title="Click to view this candidate" data-ajax="false" />'. $candidateName .'</a></p>';		
            $count++;
        } 
    }       
?>