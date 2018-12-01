<!DOCTYPE html>
<html lang="en">
<head>
<!--
"Time-stamp: <Thu, 10-08-15, 18:48:04 Eastern Daylight Time>"
//-->
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="My online portfolio that illustrates skills acquired while working through various project requirements.">
	<meta name="author" content="Katie McTigue">
	<link rel="icon" href="favicon.ico">

	<title>LIS4381 - Assignment 5</title>

<!-- Include FontAwesome CSS to use feedback icons provided by FontAwesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<!-- Bootstrap for responsive, mobile-first design. -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Note: following file is for form validation. -->
<link rel="stylesheet" href="css/formValidation.min.css"/>

<!-- Starter template for your own custom styling. -->
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
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					
					<div class="page-header">
						<?php include_once("global/header.php"); ?>	
					</div>

					<h2>Pet Stores</h2>

						<form id="edit_petstore" method="post" class="form-horizontal" action="edit_petstore_process.php">
					<!--BEGIN EDIT -->

						<?php

						require_once "global/connection.php";

						//capture pst ID from Index.php page
						$pst_id_v = $_POST['pst_id'];

						//find all data associated with selected petstore id above
						$query = 
						"SELECT *
						FROM petstore
						WHERE pst_id = :pst_id_p";

						//display query statement then exit- just for testing
						//exit($query);

						$statement = $db->prepare($query);
						$statement->bindParam(':pst_id_p', $pst_id_v);
						$statement->execute();
						$result = $statement->fetch();
						while ($result != null)
						{
						?>

							<input type="hidden" name="pst_id" value="<?php echo $result['pst_id']; ?>" />
						
								<div class="form-group">
										<label class="col-sm-3 control-label">Name:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="30" name="pst_name" value="<?php echo $result['pst_name']; ?>"/>
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-3 control-label">Street:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="30" name="pst_street" value="<?php echo $result['pst_street']; ?>"/>
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-3 control-label">City:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="30" name="pst_city" value="<?php echo $result['pst_city']; ?>"/>
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-3 control-label">State:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="2" name="pst_state" value="<?php echo $result['pst_state']; ?>"/>
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-3 control-label">Zip:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="9" name="pst_zip" value="<?php echo $result['pst_zip']; ?>"/>
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-3 control-label">Phone:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="10" name="pst_phone" value="<?php echo $result['pst_phone']; ?>"/>
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-3 control-label">Email:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="100" name="pst_email" value="<?php echo $result['pst_email']; ?>"/>
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-3 control-label">URL:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="100" name="pst_url" value="<?php echo $result['pst_url']; ?>"/>
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-3 control-label">YTD Sales:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="11" name="pst_ytd_sales" value="<?php echo $result['pst_ytd_sales']; ?>"/>
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-3 control-label">Notes:</label>
										<div class="col-sm-5">
												<input type="text" class="form-control" maxlength="255" name="pst_notes" />
										</div>
								</div>

						<?php
						$result = $statement->fetch();
						}
						$db = null; 
						?>

								<div class="form-group">
										<div class="col-sm-9 col-sm-offset-3">
												<button type="submit" class="btn btn-primary" name="edit" value="edit">Update</button>
										</div>
								</div>
						</form>
					</div>
			</div>

			<?php include_once "global/footer.php"; ?>
			
		</div> <!-- end starter-template -->
 </div> <!-- end container -->

	
	<!-- Bootstrap JavaScript
	================================================== -->
	<!-- Placed at end of document so pages load faster -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- Turn off client-side validation, in order to test server-side validation.  -->
<!--<script type="text/javascript" src="js/formValidation/formValidation.min.js"></script> -->

<!-- Note the following bootstrap.min.js file is for form validation, different from the one above. -->
<script type="text/javascript" src="js/formValidation/bootstrap.min.js"></script>

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="js/ie10-viewport-bug-workaround.js"></script>

<script type="text/javascript">
$(document).ready(function() {

	$('#edit_petstore').formValidation({
			message: 'This value is not valid',
			icon: {
					valid: 'fa fa-check',
					invalid: 'fa fa-times',
					validating: 'fa fa-refresh'
			},
			fields: {
					name: {
							validators: {
									notEmpty: {
											message: 'Name is required'
									},
									stringLength: {
											min: 1,
											max: 30,
											message: 'Name must be less than 30 characters long'
									},
									regexp: {
										//alphanumeric, hyphens, underscores, and spaces
										//regexp: /^[a-zA-Z0-9\-_\s]+$/,										
										//similar to: (though, \w supports other Unicode characters)
										regexp: /^[\w\-\s]+$/,
										message: 'Name can only contain letters, numbers, hyphens, and underscore'
									},									
							},
					},

					street: {
							validators: {
									notEmpty: {
											message: 'Street is required'
									},
									stringLength: {
											min: 1,
											max: 30,
											message: 'Street no more than 30 characters long'
									},
									regexp: {
										//alphanumeric, hyphens, underscores, and spaces
										//regexp: /^[a-zA-Z0-9\-_\s]+$/,										
										//similar to: (though, \w supports other Unicode characters)
										regexp: /^[a-zA-Z0-9\s]+$/,
										message: 'Street can only contain letters or numbers'
									},									
							},
					},

					city: {
							validators: {
									notEmpty: {
											message: 'City required'
									},
									stringLength: {
											min: 1,
											max: 30,
											message: 'City no more than 30 characters long'
									},
									regexp: {
										//alphanumeric, hyphens, underscores, and spaces
										//regexp: /^[a-zA-Z0-9\-_\s]+$/,										
										//similar to: (though, \w supports other Unicode characters)
										regexp: /^[a-zA-Z\s]+$/,
										message: 'City can only contain letters'
									},									
							},
					},

					state: {
							validators: {
									notEmpty: {
											message: 'State required'
									},
									stringLength: {
											min: 2,
											max: 2,
											message: 'State must be two characters'
									},
									regexp: {
										//alphanumeric, hyphens, underscores, and spaces
										//regexp: /^[a-zA-Z0-9\-_\s]+$/,										
										//similar to: (though, \w supports other Unicode characters)
										regexp: /^[a-zA-Z]+$/,
										message: 'State can only contain letters'
									},									
							},
					},

					zip: {
							validators: {
									notEmpty: {
											message: 'Zip required, only numbers'
									},
									stringLength: {
											min: 5,
											max: 9,
											message: 'SZip must be 5, and no more than 9 digits'
									},
									regexp: {
										//alphanumeric, hyphens, underscores, and spaces
										//regexp: /^[a-zA-Z0-9\-_\s]+$/,										
										//similar to: (though, \w supports other Unicode characters)
										regexp: /^[0-9]+$/,
										message: 'Zip can only contain numbers'
									},									
							},
					},

					phone: {
							validators: {
									notEmpty: {
											message: 'Phone is required, including area code, numbers only'
									},
									stringLength: {
											min: 10,
											max: 10,
											message: 'Phone must be 10 digits'
									},
									regexp: {
										//alphanumeric, hyphens, underscores, and spaces
										//regexp: /^[a-zA-Z0-9\-_\s]+$/,										
										//similar to: (though, \w supports other Unicode characters)
										regexp: /^[0-9]+$/,
										message: 'Phone can only contain numbers'
									},									
							},
					},

					email: {

							validators: {
									notEmpty: {
											message: 'Email address is required'
									},
									emailAddress: {
											message: 'Must include valid email address'
									},
									stringLength: {
											min: 1,
											max: 100,
											message: 'Email no more than 100 characters'
									},
							},
					},

					url: {

							validators: {
									notEmpty: {
											message: 'URL required'
									},
									stringLength: {
											min: 1,
											max: 100,
											message: 'URL no more than 100 characters'
									},
							},
					},

					ytdsales: {
							validators: {
									notEmpty: {
											message: 'YTD Sales is required'
									},
									stringLength: {
											min: 1,
											max: 11,
											message: 'YTD Sales can be no more than 10 digits, including decimal point.'
									},
									regexp: {
										//alphanumeric, hyphens, underscores, and spaces
										//regexp: /^[a-zA-Z0-9\-_\s]+$/,										
										//similar to: (though, \w supports other Unicode characters)
										regexp: /^[0-9\.]+$/,
										message: 'YTD Sales can only contain numbers and decimal point'
									},									
							},
					},


					
			}
	});
});
</script>

</body>
</html>
