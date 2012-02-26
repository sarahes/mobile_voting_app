<!DOCTYPE html>
<html>
<head>
<title>DIG 4104c Project 2 - Adam Boerema - Sarah Sheehan - Melinda Velasquez</title>
	<meta charset="utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
    <script src="js/application.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
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

    <!-- Page - Vote -->
    <div data-role="page" id="vote">
      <div data-role="header">
        <h1>Toontown Election</h1>
      </div>
      <div data-role="content" class="center">
        <!-- This is just the page that shows all of the candidates. The individual candidate pages + the button to vote for that candidate are in includes/candidate_pages.php -->
        <?php include_once 'includes/vote.php' ?>
      </div>
    </div>

    <!-- Here is where the individual candidate pages will go. The number of pages will depend on the number of candidates currently entered into the database. -->
    <?php include_once 'includes/candidate_pages.php' ?>
    
    <!-- Page - Results -->
    <div data-role="page" id="results">
      <div data-role="header">
        <h1>Toontown Election</h1>
      </div>
      <div data-role="content" class="center">
            <?php include_once 'includes/results.php' ?>
      </div>
    </div>

</body>
</html>