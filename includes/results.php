<?php
	session_start();
	include_once("config/db.php");	
	include_once("scripts/get_results.php");	
	
	//check if user is logged in - if they have already voted, display special message, otherwise just show the voting results
	if ($_SESSION['logged'])
	{
		$alreadyVoted = htmlspecialchars($_GET["alreadyVoted"]);
		if($alreadyVoted){
			echo "You have already cast your vote. Here are the current results:";
		}
		else{
			echo "Thank you for vote! Here are the current results:";
		}
	}
	
?>
			
		<div class="results">		
			<?php get_results($conn); ?>		
		</div>	