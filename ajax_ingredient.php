<!-- DO NOT MOVE FROM ROOT -->

<!-- The AJAX Ingredients Page

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
ingredient.  -->
