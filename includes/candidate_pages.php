<?php   
    global $candidates;   
    $count = 1;
    
    $characterInfoPage = array(
    	"BugsBunny" => "Bugs Bunny can be mischievous, cunning, impudent, a rascally heckler, a trickster, saucy, and very quick with words, but he is never belligerent and prefers to use his wits rather than resort to physical violence.",
    	"DaffyDuck" => "A cunning, cowardly, cheeky and boastful character. Daffy is one of the world's most beloved characters.",   	
    	"PorkyPig" => "Porky Pig is wise and good-natured, but also shy and cowardly. He tends to be the voice of reason among the Looney Tunes. Th-th-th-tha-tha-tha-that's all, folks!"
    );
    	
    
    foreach($candidates as $candidateName)
    {	
		$voteCount = getCandidateVotes($candidateName);
		
        $candidateIdName = preg_replace("/\s/", "", $candidateName);
        $candidateImg = strtolower($candidateIdName);
        $candidatePage = strtolower($candidateIdName) . "page";
        
    	console.log($candidateIdName);
    ?>
    
        <div data-role="page" data-theme="a" id="<?php echo $candidatePage ?>">
            <div data-role="header">
                <h1>Toontown Election</h1>        
            </div>
            <div data-role="content">       
                <h2><?php echo $candidateName ?></h2>                     
                <form action="" method="post" data-ajax="false" >					
                    <p><img src="images/<?php echo $candidateImg ?>.png" alt="<?php echo $candidateName ?>" /></p> 
					<p class="character-info"><?php echo $characterInfoPage["$candidateIdName"] ?></p>
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