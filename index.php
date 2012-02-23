<!DOCTYPE html>
<html>
<head>
<title>DIG 4104c Project 2 - Adam Boerema - Sarah Sheehan - Melinda Velasquez</title>
	<meta charset="utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/themes/custom-theme.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#reg').tap(function(e) {		
				e.preventDefault();
			
				$.post('scripts/login.php', {
					name : $('#name').val(),
					voterId : $('#voterId').val()				
				},
				function(data) {
						if(data.voterId){						
							$.mobile.changePage($("#vote"));						
						}
				}, "json");
				
				return false;
			});				
		});
	</script>
</head>
<body>
<div data-role="page" id="register">
  <div data-role="header">
    <h1>"Voting ID"</h1>
  </div>
  <div data-role="content" class="center">
  	<?php include_once 'includes/register.php' ?>
  </div>
</div>
<div data-role="page" id="vote">
  <div data-role="header">
    <h1>"Choose a Candidate"</h1>
  </div>
  <div data-role="content" class="center">
  	<?php include_once 'includes/vote.php' ?>
  </div>
</div>
<div data-role="page" id="vote">
  <div data-role="header">
    <h1>"Vote Totals"</h1>
  </div>
  <div data-role="content" class="center">
		<?php include_once 'includes/results.php' ?>
  </div>
</div>
</body>
</html>