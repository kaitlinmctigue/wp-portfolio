<?php
//show errors: at least 1 and 4...
//delete
ini_set('display_errors', 1);
//ini_set('log_errors', 1);
//ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

//get item id
$pst_id_v = $_POST['pst_id'];

//validate input
if (empty($pst_id_v))
{
	$error = "Invalid data. Check field and try again.";
	include('global/error.php');
}

else{

// if valid, delete
require_once('global/connection.php');

// pull in fcn library
require_once "global/functions.php";

//call fcn 
delete_petstore($pst_id_v);

//include('index.php'); //forwarding is faster, one trip to server
header('Location: index.php'); //sometimes, redirecting is needed (two trips to server)
	}
?>
