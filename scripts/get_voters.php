<?php	
	$dir = getcwd();
	
	if(strstr($dir, 'scripts')){
		include('../config/db.php');		
	}
	else{
		include('config/db.php');
	}

    //get all of the voters
    $c = $conn->query("select * from voters order by voter_id");          
    $c->setFetchMode(PDO::FETCH_OBJ);  
       
	//print out a table of all the current voters, who they voted for and a delete button
?>
	<p><input type="submit" value="Delete All Votes" id="deleteAll" /></p>
	<table>
		<tr>
			<th scope="col">Voter ID </th>
			<th scope="col">Name </th>
			<th scope="col">Remove Vote </th>
		</tr>

<?php
		$count = 1;
        while ($voter = $c->fetch())
        {		
			if($count % 2)
			{
				echo '<tr class="even">';
			}
			else
			{
				echo '<tr>';
			}
		?>			
				<td><?php echo $voter->voter_id; ?>  </td>
				<td><?php echo $voter->name; ?> </td>
				<td>
					<form class="deleteForm" action="" method="post" data-ajax="false">
						<input type="hidden" value="<?php echo $voter->voter_id; ?>" />
						<input type="submit" value="Delete" class="deleteVote" />
					</form>
				</td>
			</tr>
		<?php
			$count++;
        }            
                  
    
?>	