<!--SERVER-->

<?php
//comment out next line if using on remote host
$IP="local";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

//example:
if ($IP=="adasfasfafs")
{
	$dsn = 'mysql:host=localhost;port=3306;dbname=kmctigue_lis4381';
	$username = 'root';
	$password = 'mysql';
}

//contact your Web host for DB connection documentation
else
{
	$dsn = 'mysql:host=localhost;port=3306;dbname=kmctigue_lis4381';
	$username = 'kmctigue_km';
	$password = 'TimLeary3';
}

try 
{
  //instantiate new PDO connection
  $db = new PDO($dsn, $username, $password, $options);
	  //echo "Connected successfully using pdo extension!<br /><br />";
} 
catch (PDOException $e) 
{
	//only use for testing, to avoid providing security exploits
	//after testing, create custom error message
  //echo $e->getMessage();  //display error on this page
  $error = $e->getMessage(); 
  include('error.php'); //display in custom error page (forwarding is faster, one trip to server)
	//header('Location: error.php'); //sometimes, redirecting is needed (two trips to server)
  exit();
}

function display_db_error($error)
{
	//include error.php
	header('Location: error.php');
	exit();
}
?>
