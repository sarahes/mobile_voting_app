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
                    var voterId = data.voterId;
                    var name = data.name;
                    voterMessage = document.getElementById('voterMessage');
                    voterMessage.innerHTML = "<p>Welcome, " + name + ".</p><p>Here are your candidates. Select one to view more information or cast your vote. </p>";
					$.mobile.changePage($("#vote"));	
				}
				else
				{
					alreadyVoted = true; 
                    alreadyVotedDiv = document.getElementById('alreadyVoted');
                    alreadyVotedDiv.innerHTML = "<p>You have already voted once. You may not vote again. </p>";
                    alreadyVotedDiv.setAttribute("class", "show");   
                   	$.mobile.changePage($("#results"));									
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
                alreadyVotedDiv = document.getElementById('alreadyVoted');
                alreadyVotedDiv.innerHTML = "<p>You have already voted once. You may not vote again. </p>";
                alreadyVotedDiv.setAttribute("class", "show");   
            }
        }, "json");
				
        return false;
	});
    
    $('#BettyBoop').tap(function(e) {		
		e.preventDefault();        
         
		$.mobile.changePage($("#bettybooppage"));	        
	});
    
     $('#BugsBunny').tap(function(e) {		
		e.preventDefault();       
                
		$.mobile.changePage($("#bugsbunnypage"));	
        
	});
    
     $('#DonaldDuck').tap(function(e) {		
		e.preventDefault();        
           
		$.mobile.changePage($("#donaldduckpage"));	
        
	});

   
});