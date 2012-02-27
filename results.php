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
          $("#resultsDiv").load('scripts/get_results.php');
           var refreshId = setInterval(function() {               
              $("#resultsDiv").load('scripts/get_results.php?randval='+ Math.random());
           }, 9000);
           $.ajaxSetup({ cache: false });
        });

    </script>
</head>

<body>   
    <div data-role="page" id="results">
      <div data-role="header">
        <h1>Toontown Election Results</h1>
      </div>
      <div data-role="content">		
			<div id="resultsDiv">
					
            </div>			
      </div>
    </div>    
</body>
</html>    
        