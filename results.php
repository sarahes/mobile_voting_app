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

<body>   
    <div data-role="page" id="results" data-theme="a">
     <script>
        $("#results").live('pageinit',function() {
           $("#resultsList").load('scripts/get_results.php');
           var refreshId = setInterval(function() {               
              $("#resultsList").load('scripts/get_results.php?randval='+ Math.random());
           }, 3000);
           $.ajaxSetup({ cache: false });
        });
    </script>
      <div data-role="header">
        <h1>Toontown Election Results</h1>
        <a href="index.php" data-icon="home" data-ajax="false">Home</a>
      </div>
      <div data-role="content">		
			<div id="resultsList">
                    
            </div>			
      </div>
    </div>    
</body>
</html>    
        