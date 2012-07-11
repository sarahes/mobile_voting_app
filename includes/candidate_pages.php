<?php   
    global $candidates;   
    $count = 1;
    
    $characterInfo = array(
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

    ?>
    
        <div data-role="page" data-theme="a" align="center" id="<?php echo $candidatePage ?>">
            <div data-role="header">
                <h1>Toontown Election</h1> 
                <a href="#vote" data-icon="back">Back</a>
            </div>
            <div data-role="content">                              
                <form action="" method="post" data-ajax="false" >	
                    <p class="character-image"><img src="images/<?php echo $candidateImg ?>.png" alt="<?php echo $candidateName ?>" /></p>
                    <?php echo "<p class='character-votes'>Votes: ". getCandidateVotes($candidateName) ."</p>"; ?>
                    <br class="clear" />
                    <p class="character-info"><?php echo $characterInfo["$candidateIdName"] ?></p>

                    <input type="hidden" class="candidateId" value="<?php echo $count ?>" />
                    <input type="submit" class="castvote" value="Vote for <?php echo $candidateName ?>" />
                </form>
            </div>
        </div>
        
    <?php
    $count++;
    } //end the for each loop
    ?>