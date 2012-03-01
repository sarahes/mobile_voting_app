<?php		
	include('config/db.php');
	
    //get all of the voters
    $c = $conn->query("select *, c.name as candidate_name, v.name as voter_name from voters as v
						left join candidates as c on c.id = v.candidate_id
						order by voter_id");          
    $c->setFetchMode(PDO::FETCH_OBJ);  
    
	$count = $c->rowCount();
	
	if($count > 0)
	{
	//print out a table of all the current voters, who they voted for and a delete button
?>
	<p><input type="submit" value="Reset Votes" id="deleteAll" /></p>
	<table>
		<tr>
			<th scope="col">Voter ID </th>
			<th scope="col">Name </th>
			<th scope="col">Vote </th>
			<th scope="col">Remove Vote </th>
		</tr>

<?php
		$count = 1;
        while ($row = $c->fetch())
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
				<td><?php echo $row->voter_id; ?>  </td>
				<td><?php echo $row->voter_name; ?> </td>
				<td><?php echo $row->candidate_name; ?> </td>
				<td>
					<form class="deleteForm" action="" method="post" data-ajax="false">
						<input type="hidden" value="<?php echo $row->voter_id; ?>" />
						<input type="submit" value="Delete" class="deleteVote" />
					</form>
				</td>
			</tr>
		<?php
			$count++;
        }            
                  
    }
	else //if there is no one in the voters table
	{
		echo "<p>There are currently no votes. </p> ";
	}
?>	