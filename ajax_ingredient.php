<?php
/*
DO NOT MOVE FROM ROOT

===== The AJAX Ingredients Page =====

Your ajax_ingredient.php page will return additional information on a specific
ingredient appropriate for the generation of a display page highlighting the
ingredient. Note this page will be used with an ingredient specifying on the
URL. So, continuing in the spirit of caring about kale:

ajax_ingredient.php?ing="kale"

This AJAX call returns a JSON object very similar to a single entry from the
ajax_listing.php page with two notable exceptions. It will include two
additional fields in order to supply a long description, desc , and an
availability status, time . So, for example:

{"name":"Kale","short":"Cabbage on the
Wildside","unit":"lbs","cost":"2.69","time":"Ships today","desc":"A very
popular member of the Cabbage family sometimes conisdered more elemental or
primitive relative to other forms of cabbage. As to health benefits, consider
this: \"Lutein and zeaxanthin, nutrients that give kale its deep, dark green
coloring and protect against macular degeneration and cataracts Minerals
including phosphorus, potassium, calcium, and zinc.\" according to WebMD."}

As you write the code to generate these AJAX responses pay attention to escape
characters in the formatting of strings, particularly the long description.
Observe above that json_encode added and escape character in front of each of
the internal quotations marks. Finally, for your own sake and the other sites
depending upon you, make sure that information in the common fields returned by
ajax_ingredient.php matches that returned by ajax_listing.php for the same
ingredient.

*/


// application/json because: http://stackoverflow.com/a/2590013
header ( 'Content-Type: application/json' );

// what this does (cross-scripting): http://stackoverflow.com/a/10636765
header ( "Access-Control-Allow-Origin: *" );

// headings: name, short (short description),unit (bunch, kg), cost, time (how
// long it takes to ship), desc (long description)
$heading1 = "name";
$heading2 = "short";
$heading3 = "unit";
$heading4 = "cost";
$heading5 = "time";
$heading6 = "desc";

$unit = "kg";

// ingredients
$ing1 = array (
	$heading1 => "Cabbage",
  $heading2 => "Best when fermented",
  $heading3 => $unit,
  $heading4 => "9.97",
  $heading5 => "2 days",
  $heading6 => "Cabbage or headed cabbage (comprising several cultivars of
  Brassica oleracea) is a leafy green or purple biennial plant, grown as an
  annual vegetable crop for its dense-leaved heads. It is descended from the
  wild cabbage, B. oleracea var. oleracea, and is closely related to broccoli
  and cauliflower (var. botrytis), Brussels sprouts (var. gemmifera) and savoy
  cabbage (var. sabauda) which are sometimes called cole crops. Cabbage heads
  generally range from 0.5 to 4 kilograms (1 to 9 lb), and can be green, purple
  and white. Smooth-leafed firm-headed green cabbages are the most common, with
  smooth-leafed red and crinkle-leafed savoy cabbages of both colors seen more
  rarely. It is a multi-layered vegetable. Under conditions of long sunlit days
  such as are found at high northern latitudes in summer, cabbages can grow
  much larger.",
);

$ing2 = array (
	$heading1 => "Eggplant",
  $heading2 => "Good in ratatouille",
  $heading3 => $unit,
  $heading4 => "2.18",
  $heading5 => "2 days",
  $heading6 => "Eggplant (Solanum melongena), or aubergine, is a species of
  nightshade grown for its edible fruit. Eggplant is the common name in North
  America and Australia, but British English uses the French word aubergine. It
  is known in South Asia, Southeast Asia, and South Africa as brinjal.",
);

$ing3 = array (
	$heading1 => "Leek",
  $heading2 => "Not as good as onions",
  $heading3 => $unit,
  $heading4 => "6.99",
  $heading5 => "2 days",
  $heading6 => "The leek is a vegetable, a cultivar of Allium ampeloprasum, the
  broadleaf wild leek. The edible part of the plant is a bundle of leaf sheaths
  that is sometimes erroneously called a stem or stalk. Historically, many
  scientific names were used for leeks, but they are now all treated as
  cultivars of A. ampeloprasum. The name leek developed from the Anglo-Saxon
  word leac. Two closely related vegetables, elephant garlic and kurrat, are
  also cultivars of A. ampeloprasum, although different in their uses as food.
  The onion and garlic are also related, being other species of the genus
  Allium.",
);

// use post? to grab ingredient name, switch statement to assign it to
// $ingredient

// if "cabbage":
// $ingredient = array (
// 	$ing1,
// );

// Your ajax_status.php page must return a JSON object
echo json_encode ( $ingredient );
?>
