<?php	

	//check if user is logged in - if they have already voted, display special message, otherwise just show the voting results
	/*$alreadyVoted = htmlspecialchars($_GET["alreadyVoted"]);
	if($alreadyVoted){
			echo "You have already cast your vote. Here are the current results:";
		}
		else{
			echo "Thank you for vote! Here are the current results:";
		}
	}*/
    include_once('scripts/get_results.php');
	
?>		
    <div id="alreadyVoted"> </div>
	<div class="results">		
		<?php getResults(); ?>		
	</div>	