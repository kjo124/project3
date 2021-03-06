<?php
/*
DO NOT MOVE FROM ROOT

===== AJAX Listing Page =====

Your site must provide a page, ajax_listing.php , through which any other site
in the federation may obtain a listing of available ingredients. The results
should be returned using JSON. Here is an example:

[{"name":"Carrot","short":"What's Up
Doc","unit":"bunch","cost":"1.99"},{"name":"Kale","short":"Cabbage on the
Wildside","unit":"lbs","cost":"2.69"}]

The name field must be unique to your site and it will be used in other AJAX
calls to specify a specific ingredient your site sells. The short description
is whatevery you like so long as the text does not exceed 50 characters. The
unit field clarifies for customers what the our buying when they select a
quantity to purchase. Finally, cost is a dollar amount per unit specified in
the format shown: i.e. dollars then a colon then cents.  -->
*/

// application/json because: http://stackoverflow.com/a/2590013
header ( 'Content-Type: application/json' );

// what this does (cross-scripting): http://stackoverflow.com/a/10636765
header ( "Access-Control-Allow-Origin: *" );

// headings: name, short (short bit),unit (bunch, kg), cost
$heading1 = "name";
$heading2 = "short";
$heading3 = "unit";
$heading4 = "cost";

$unit = "kg";

// ex. {"name":"Carrot","short":"What's Up Doc","unit":"bunch","cost":"1.99"}
$ing1 = array (
	$heading1 => "Cabbage",
  $heading2 => "Best when fermented",
  $heading3 => $unit,
  $heading4 => "9.97",
);

$ing2 = array (
	$heading1 => "Eggplant",
  $heading2 => "Good in ratatouille",
  $heading3 => $unit,
  $heading4 => "2.18",
);

$ing3 = array (
	$heading1 => "Leek",
  $heading2 => "Not as good as onions",
  $heading3 => $unit,
  $heading4 => "6.99",
);

// all the ingredients inserted into $listings
$listings = array (
	$ing1,
  $ing2,
  $ing3,
);

// $listings returned using JSON
echo json_encode ( $listings );
?>
