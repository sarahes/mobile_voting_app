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
            var alreadyVoted = false;
            
            $('#reg').tap(function(e) {		
                e.preventDefault();
                    
                $.post('scripts/login.php', {
                    name : $('#name').val(),
                    voterId : $('#voterId').val()				
                },
                function(data) {
                    if(data.voterId){						
                        if(!data.alreadyVoted)
                        {
                            $.mobile.changePage("vote.php?voterId=" + data.voterId + "&name=" + data.name);                   
                        }
                        else
                        {
                            alreadyVoted = true;                    
                            $.mobile.changePage("results.php?alreadyVoted=" + alreadyVoted);   								
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
        });   
    </script>
</head>

<body>
    <!-- Page - Register -->
    <div data-role="page" id="register">
      <div data-role="header">
        <h1>Toontown Election</h1>        
      </div>
      <div data-role="content" class="center">       
        <?php include_once 'includes/register.php' ?>
      </div>
    </div>
</body>
</html>