<?php include('scripts/get_candidates.php'); ?>

<h2>Candidates </h2>
	<p>Here are your candidates. Select one to view more information or cast your vote. </p>
	<?php 
        global $candidates; 
        $candidates = getCandidates(); 
        candidateLinks();
    ?>
    
   