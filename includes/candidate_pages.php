<?php   
    global $candidates;   
    $count = 1;
    
    foreach($candidates as $candidateName)
    {	
		$voteCount = getCandidateVotes($candidateName);
		
        $candidateIdName = preg_replace("/\s/", "", $candidateName);
        $candidateImg = strtolower($candidateIdName);
        $candidatePage = strtolower($candidateIdName) . "page";
    ?>
    
        <div data-role="page" id="<?php echo $candidatePage ?>">
            <div data-role="header">
                <h1>Toontown Election</h1>        
            </div>
            <div data-role="content">       
                <h2><?php echo $candidateName ?></h2>                     
                <form action="" method="post" data-ajax="false" >					
                    <p><img src="images/<?php echo $candidateImg ?>.png" alt="<?php echo $candidateName ?>" /></p> 
					<p>About this candidate: ... </p>
					<?php echo "<p>Votes: ". getCandidateVotes($candidateName) ."</p>"; ?>
                    <input type="hidden" class="candidateId" value="<?php echo $count ?>" />
                    <input type="submit" class="castvote" value="Vote for <?php echo $candidateName ?>" />
                </form>
            </div>
        </div>
        
    <?php
    $count++;
    } //end the for each loop
    ?>