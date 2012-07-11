<!DOCTYPE html>
<html>
<head>
<title>DIG 4104c Project 2 - Adam Boerema - Sarah Sheehan - Melinda Velasquez</title>
    <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">	
    <link rel="stylesheet" href="css/themes/town.min.css" />
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile.structure-1.0.1.min.css" />
    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
    <link rel="stylesheet" href="css/styles.css" />
    </head>
    <script>
        $(document).ready(function() {
            $('.deleteVote').tap(function(e) {		
                e.preventDefault(); 
                
                $.post("scripts/delete_vote.php", { voterId : $(this).parent().parent().children('input[type=hidden]').val() },
                function(data){
                    alert("This vote has been removed"); 
                    location.reload(true);
                });
                
            });	  

            $('#deleteAll').tap(function(e) {		
                e.preventDefault(); 
                
                $.post("scripts/delete_all_votes.php",
                function(data){
                    alert("All votes have been removed"); 
                    location.reload(true);
                });
                
            });
        });   
    </script>
</head>
<body> 
    <!-- Admin Page -->
    <div data-role="page" id="admin" data-theme="a" align="center">
      <div data-role="header">
        <h1>Administrative</h1>
        <a href="index.php" data-icon="home" data-ajax="false">Home</a>        
      </div>
      <div data-role="content">
        <div id="votersList">
            <?php include 'scripts/get_voters.php'; ?>
        </div>
      </div>
    </div>	
</body>
</html>	