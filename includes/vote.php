<?php include('scripts/get_candidates.php'); ?>

<h2>Candidates </h2>	
    <div id="voterMessage"> </div>
	<?php 
        //$voterId = $_POST["voterId"];
        //echo $voterId . "voter id";
        global $candidates; 
        $candidates = getCandidates(); 
        candidateLinks();
    ?>
    
   