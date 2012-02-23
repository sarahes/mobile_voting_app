<?php
	session_start();
	include_once('includes/header.php');
	
	//you need to be logged in to vote
	if (!$_SESSION['logged'])
	{		
		echo "<p>You are not logged in.<br /> <a href='index.php'>Return to login</a>. </p>";
	}
    else
	{	
		$voterId = htmlspecialchars($_GET["voterId"]);
?>


			
	<p><?php echo $voterId; ?>, cast your vote: </p>
				
	<form action="scripts/cast_vote.php" method="post">
		<ul>
			<li>
				<label for="candidateId">Vote for: </label>
				<input type="radio" name="candidateId" value="1" /> Bugs 	
				<input type="radio" name="candidateId" value="2" /> Betty 	
				<input type="radio" name="candidateId" value="3" /> Woody
			</li>
			<input type="hidden" name="voterId" value="<?php echo $voterId; ?>" />
			<li><input type="submit" /></li>
		</ul>		
	</form>
			
<?php
	}
	include_once('includes/footer.php');
?>