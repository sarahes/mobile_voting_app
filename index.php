<!DOCTYPE html>
<html>
<head>
<title>DIG 4104c Project 2 - Adam Boerema - Sarah Sheehan - Melinda Velasquez</title>
	<meta charset="utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
    
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
								$.mobile.changePage($("#vote"));	
							}
							else
							{
								alreadyVoted = true;
								$.mobile.changePage($("#results"));	
								
							}
						}
						else
						{
							alert("The voter id you entered was invalid. Please try again.");					
						}
				}, "json");
				
				return false;
			});	

           $('#castvote').tap(function(e) {		
				e.preventDefault();
              
				$.post('scripts/cast_vote.php', {
                    voterId : $('#voterId').val(),
					candidateId : $(":checked").val()								
				},
				function(data) {
                    if(data.candidateId)
                    {
						$.mobile.changePage($("#results"));	
                    }
                    else
                    {
                        alert("poop");
                    }
				}, "json");
				
				return false;
			});
		});
	</script>
</head>
<body>
    <!-- Page 1 - Register -->
    <div data-role="page" id="register">
      <div data-role="header">
        <h1>Toon Town Election</h1>
      </div>
      <div data-role="content" class="center">
        <?php include_once 'includes/register.php' ?>
      </div>
    </div>

    <!-- Page 2 - Vote -->
    <div data-role="page" id="vote">
      <div data-role="header">
        <h1>Toon Town Election</h1>
      </div>
      <div data-role="content" class="center">
        <?php include_once 'includes/vote.php' ?>
      </div>
    </div>

    <!-- Page 3 - Results -->
    <div data-role="page" id="results">
      <div data-role="header">
        <h1>Toon Town Election</h1>
      </div>
      <div data-role="content" class="center">
            <?php include_once 'includes/results.php' ?>
      </div>
    </div>

</body>
</html>