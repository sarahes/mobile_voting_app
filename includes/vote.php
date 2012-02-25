	<p>Cast your vote: </p>
				
	<form action="" method="post" data-ajax="false">
		<ul>
			<li>
				<label for="candidateId">Vote for: </label>
				<input type="radio" name="candidateId" value="1" /> Bugs 	
				<input type="radio" name="candidateId" value="2" /> Donald 	
				<input type="radio" name="candidateId" value="3" /> Betty
			</li>
			<input type="hidden" name="voterId" value="<?php echo $voterId; ?>" />
			<li><input type="submit" id="castvote" value="Cast Your Vote" /></li>
		</ul>		
	</form>
			