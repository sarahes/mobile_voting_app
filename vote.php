<!DOCTYPE html>
<html>
<head>
<title>DIG 4104c Project 2 - Adam Boerema - Sarah Sheehan - Melinda Velasquez</title>
	<meta charset="utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>    
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
    <link rel="stylesheet" href="css/styles.css" /> 
    <script>
        $(document).ready(function() {
            $('#castvote').tap(function(e) {		
                e.preventDefault();
                          
                $.post('scripts/cast_vote.php', {
                    voterId : $('#voterId').val(),
                    candidateId : $("#candidateId").val()								
                },
                function(data) {
                    $.mobile.changePage("results.php");	                
                }, "json");                         
            });   
        }); 
    </script>
</head>

<body>
    <?php 
        $voterId = $_GET["voterId"]; 
        $name = $_GET["name"];        
    ?>
    <!-- Page - Vote -->
    <div data-role="page" id="vote">
      <div data-role="header">
        <h1>Toontown Election</h1>
      </div>
      <div data-role="content" class="center">
        <?php include('scripts/get_candidates.php'); ?>

        <h2>Candidates </h2>
            
            <div id="voterMessage">
                <p>Welcome <?php echo $name ?>. Here are your candidates. Select one to view more information or cast your vote. </p>
            </div>
            <?php                
                global $candidates; 
                $candidates = getCandidates(); 
                candidateLinks();
            ?>
      </div>
    </div>

    <!-- Here is where the individual candidate pages will go. The number of pages will depend on the number of candidates currently entered into the database. -->
    <?php include_once 'includes/candidate_pages.php' ?>    

</body>
</html>    
    
   