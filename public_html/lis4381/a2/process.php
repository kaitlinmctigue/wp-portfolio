<?php 
//show errors
ini_set('display_errors', 1);
//ini_set('log_errprs', 1);
//ini_set('error_log', dirname(FILE), '/error_log.txt');
error_reporting(E_ALL);

//for initial test of form inputs, and demoing no htmlspecialchars()
//exit(print_r($_POST));

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$comments = trim($_POST['comments']);

// htmlspecialchars() protects against hackers

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="My online portfolio that illustrates skills acquired while working through various project requirements.">
	<meta name="author" content="Kaitlin McTigue">
    <link rel="icon" href="favicon.ico">

		<title>LIS4381 - Assignment2</title>		

<!-- Bootstrap core CSS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Custom styles with this template -->
<link href="css/starter-template.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

  </head>

  <body>

  <?php include_once("../global/nav.php"); ?>
	
		<div class="container">
			<div class="starter-template">
				<div class="page-header">
					<?php include_once("global/header.php"); ?>	
				</div>

				<!-- Start form-building -->
<!--
Standard rules for all Bootstrap form layouts:
Always use <form role="form"> (helps improve accessibility for people using screen readers)
Wrap labels and form controls in <div class="form-group"> (needed for optimum spacing)
Add class .form-control to all textual <input>, <textarea>, and <select> elements

<label> element does not render anything special for user.
However, it provides usability improvement for mouse users:
if user clicks on text within <label> element, it toggles control.

"for" attribute specifies which form element a label is bound to.
Should be equal to id attribute of related element to bind them together.

A label can be bound to an element either by using "for" attribute, or by placing element inside <label> element.
-->				
				<h2>Horizontal form</h2>
				<form class="form-horizontal" role="form" action="process.php">

					<div class="form-group">
						<label class="control-label col-sm-2" for="fname">First Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="fname" value="<?php echo htmlspecialchars($fname); ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="lname">Last Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="lname" value="<?php echo htmlspecialchars($lname); ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Email:</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($email); ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Password:</label>
						<div class="col-sm-10">          
							<input type="text" class="form-control" id="pwd" value="<?php echo htmlspecialchars($pwd); ?>">
						</div>
					</div>
				
					<div class="form-group">
						<label class="control-label col-sm-2" for="comments">Comments:</label>
						<div class="col-sm-10">          
							<textarea class="form-control" rows="3" id="comments"><?php echo htmlspecialchars($comments); ?></textarea>
						</div>
					</div>
					</div>

					<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Submit</button>
						</div>
					</div>
				</form>
				<!-- End form-building -->
				
  <?php include_once "global/footer.php"; ?>

		</div> <!-- starter-template -->
    </div> <!-- end container -->

    <!-- Bootstrap core JavaScript: jQuery necessary for Bootstrap's JavaScript plugins
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
