<?php
    global $candidates;
    
    foreach($candidates as $candidateName)
    {   
        $candidateIdName = preg_replace("/\s/", "", $candidateName);
        $candidateImg = strtolower($candidateIdName);
        $candidatePage = strtolower($candidateIdName) . "page";
    ?>
    
        <div data-role="page" id="<?php echo $candidatePage ?>">
            <div data-role="header">
                <h1>Toontown Election</h1>        
            </div>
            <div data-role="content" class="center">       
                <h2><?php echo $candidateName ?></h2> 
                
                <form action="" method="post" data-ajax="false">
                    <p><img src="images/<?php echo $candidateImg ?>.jpg" alt="<?php echo $candidateName ?>" /></p>
                    <input type="submit" id="castvote" value="Vote for <?php echo $candidateName ?>" /></li>   

                </form>
            </div>
        </div>
        
    <?php
    } //end the for each loop
    ?>