<?php
/*
DO NOT MOVE FROM ROOT

===== AJAX Status Page =====

The page ajax_status.php provides a mechanism for indicating if your site is
open for business. This will be useful to all of you as you write code that
must decide when to attempt to display ingredients from another site in the
list of federated sites.

Your ajax_status.php page must return a JSON object. More precisely, if you
want to signal your site is ready for business, it should return:
{"status":"open"} and if you are not ready to have other sites querying your
site then instead return: {"status":"closed"} . Please implment this
functionality,returning the closed option ASAP, since the entire class will
start relying on each others pages.
*/

// application/json because: http://stackoverflow.com/a/2590013
header ( 'Content-Type: application/json' );

// what this does (cross-scripting): http://stackoverflow.com/a/10636765
header ( "Access-Control-Allow-Origin: *" );

// status is either closed or open indicating whether the site is ready or not
$currentStatus = "open";

$status = array ();

$status [0] = array (
  // it should return: {"status":"open"} or {"status":"closed"}
	'status' => $currentStatus,
);

// Your ajax_status.php page must return a JSON object
echo json_encode ( $status );
?>
