<?php
require_once "inc/page_setup.php";
// this is the ingredient from the URL
$id = $_GET['ing'];

$db = new Database();
$ingredient = $db->findIngredient($id);

// $requestedIngredient is now the name of the ingredient requested
$requestedIngredient = $ingredient->name;

/*
DO NOT MOVE FROM ROOT

===== The AJAX Ingredient Image Page =====

Your ajax_ingrimage.php page will stream the contents of an image of a single
named ingredient that may then in turn be displayed. The details of how to send
and image through an AJAX called will be presented in class. Note that like the
ajax_ingredient.php page, the name of the ingredient is passed along in the
URL. Indeed, the ingredient specification should be communicated in exactly the
same manner.
*/

// application/json because: http://stackoverflow.com/a/2590013
header ( 'Content-Type: application/json' );

// what this does (cross-scripting): http://stackoverflow.com/a/10636765
header ( "Access-Control-Allow-Origin: *" );

// JSON Base64 encoded image
switch ($requestedIngredient) {
  case '"Cabbage"':
    $im = file_get_contents("uploads/Cabbage.jpg");
    $imdata = base64_encode($im);
    break;
  case 'Cabbage':
    $im = file_get_contents("uploads/Cabbage.jpg");
    $imdata = base64_encode($im);
    break;
  case '"Eggplant"':
    $im = file_get_contents("uploads/Eggplant.jpg");
    $imdata = base64_encode($im);
    break;
  case 'Eggplant':
    $im = file_get_contents("uploads/Eggplant.jpg");
    $imdata = base64_encode($im);
    break;
  case '"Leek"':
    $im = file_get_contents("uploads/Leek.jpg");
    $imdata = base64_encode($im);
    break;
  case 'Leek':
    $im = file_get_contents("uploads/Leek.jpg");
    $imdata = base64_encode($im);
    break;
  default:
    $imdata = array (
      $requestedIngredient => "is not an ingredient for this site...hopefully",
    );
    break;
}

echo json_encode ( $imdata );

/*
 * Issues:
 * Currently the Ingredient object is not working correctly, a
 * $ingredient->image; call should bring back "Cabbage.jpg" but instead it is
 * just blank, this should be easy to fix but I just hardcodes these because
 * this is how the site is going to work anyways.
 */
?>
