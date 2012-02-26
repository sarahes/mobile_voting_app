<?php
    global $candidates;
    
    foreach($candidates as $candidateName)
    {   
        $candidateIdName = preg_replace("/\s/", "", $candidateName);
        $candidatePage = strtolower($candidateIdName) . "page";
    ?>
    
        <div data-role="page" id="<?php echo $candidatePage ?>">
            <div data-role="header">
                <h1>Toontown Election</h1>        
            </div>
            <div data-role="content" class="center">       
                <h2><?php echo $candidateName ?></h2> 
            </div>
        </div>
        
    <?php
    } //end the for each loop
    ?>