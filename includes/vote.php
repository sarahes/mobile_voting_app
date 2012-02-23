	<p>Cast your vote: </p>
				
	<form action="scripts/cast_vote.php" method="post">
		<ul>
			<li>
				<label for="candidateId">Vote for: </label>
				<input type="radio" name="candidateId" value="1" /> Bugs 	
				<input type="radio" name="candidateId" value="2" /> Donald 	
				<input type="radio" name="candidateId" value="3" /> Betty
			</li>
			<input type="hidden" name="voterId" value="<?php echo $voterId; ?>" />
			<li><input type="submit" /></li>
		</ul>		
	</form>
			