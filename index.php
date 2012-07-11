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
            var alreadyVoted = false;
            var voter = new Object();
            
            $('#reg').tap(function(e) {		
                e.preventDefault();
                voter.id = $('#voterId').val()
                voter.name = $('#name').val()
                               
                $.post('scripts/login.php', {   
                    voterId : voter.id,	
                    name : voter.name               			
                }, 
                function(data) {
                    if(data.voterId){						
                        if(!data.alreadyVoted)
                        {      
                            var welcome = document.getElementById('welcome');
                            welcome.innerHTML += "<p>Welcome, " + voter.name + ". Here are your candidates. Select one to view more information or cast your vote. </p>";                            
                            $.mobile.changePage($("#vote"));                   
                        }
                        else
                        {                            
                            alert("You have already voted. You will now be forwarded to the results.");
                            $.mobile.changePage("results.php");   								
                        }
                    }
                    else
                    {
                        var error = document.getElementById('error');
                        if (error.innerHTML.trim() == "")
                        {               	
                            error.innerHTML += "<p>The voter id you entered was invalid. Please try again.</p>";
                            error.setAttribute("class", "show");      
                        }
                    }
                }, "json");				
                
            });	
            
            $('.castvote').tap(function(e) {                      
                e.preventDefault(); 
                
                $.post('scripts/cast_vote.php', {
                    voterId : voter.id,
                    candidateId : $(this).parent().parent().children('input[type=hidden]').val()			
                },
                function(data) {                    
                    $.mobile.changePage("results.php");                 
                }, "json"); 
            });
        });   
    </script>
</head>

<body>
    <!-- Registration Page -->
    <div data-role="page" id="register" data-theme="a" align="center">
      <div data-role="header">
        <h1>Register to Vote</h1>        
      </div>
      <div data-role="content"> 
        <?php include_once 'includes/register.php' ?>
        <p><a class="adminlink" href="admin" data-ajax="false">Admin Page</a> </p>
      </div>
    </div>
     <!-- Vote Page -->
    <div data-role="page" id="vote" data-theme="a" align="center">
      <div data-role="header">
        <h1>Toon Town Candidates</h1>
      </div>
      <div data-role="content">
        <?php include('scripts/get_candidates.php'); ?>            
            <div id="welcome"> </div>
            <?php                
                global $candidates; 
                $candidates = getCandidates(); 
                candidateLinks();
            ?>
      </div>
    </div>
    <!-- Candidate Pages -->
    <?php include_once 'includes/candidate_pages.php' ?>    

</body>
</html>