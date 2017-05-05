<!-- Displaying All Available Ingredients

Currently you have a page that displays all ingredients for sale from you site.
For Project 3 you must now display all ingredients from all sites that are open
as defined above by status. You have a lot of latitude when it comes to how
exactly you want to display this information visually to customer. That said,
here are some guidelines and suggestions. You may want to not include thumbnail
images in this master listing becuase it will become long. However you display
each ingredient, perhpas as a unique row in a table, there must be a hyperlink
to a page hosted on your site that displays information aobut that specific
ingredient. More will be said about that page later.

You also face some choices in terms of timing and sorting. For example, you
could insert directly into the table each time you get a response from another
site. Alternatively, you could collect responses in and intermediate JavaScript
structer (array of ingredient objects perhaps) and then only redo the table
every couple of seconds or when you've detected that all open sites have
provided you their ingreidents listing information. You should also think about
how you want to group ingredients. Finally, pagination is a nice touch, but it
is NOT required for displaying ingredients in this assignment: a single long
presentation on one page is fine. -->
<?php
include 'inc/support.php';
include 'inc/control.php';
include 'inc/header.php';
$site = $_GET['site'];
$ing = $_GET['ing'];
?>

<div class="container-fluid">
	<div class="row visible-on">
		<div class="col-md-3">
      <?php
      if (isset($_SESSION['userType'])){
          if ($_SESSION['userType'] == "Customer"){?>


            <form action="" method="POST">
              <input type="submit" name="submit" value="Add to Cart">
            </form>
            <?php
            if (isset($_POST['submit'])===true) {
              if (isset($_SESSION['cart_items'])===true) {
                //Session is set
                array_push($_SESSION['cart_items'], $ingredient->name);
                echo "\n";
                echo $ingredient->name . " added to Cart!";
              } else {
                //Session is not set, setting session now
                $cart_array=array($ingredient->name);
                $_SESSION['cart_items'] = $cart_array;
              }
            }
            ?>

      <?php    }
        }
      ?>
			<?php include 'inc/authentication.php';?>
			<?php include 'inc/commenting.php';?>
			<!-- left -->
		</div>
		<div class="col-md-6">
			<!-- Display desription here -->
                       <h3 style="text-align:center;"><?php echo $ing?></h3> 
                        &nbsp; &nbsp;
                        <div class = "message">
                        <p><blockquote id="descrip"></blockquote></p>
                        <form action = "#" method = "post" style="width:200px;">
                            <div class="form-group">
                                <label for='cst'>Price: </label><br>
                                <input type="number" class="form-control" name="qty">
                            </div>
                            <button class="addToCart">Add to Cart</button>
                        </form>
			<!-- middle -->
		</div>
		<div class="col-md-3">
			<!-- displays ingredient image -->
			<image id="image"></image>

			<!-- right -->
		</div>
	</div>
</div>

<?php include 'inc/footer.php';?>

<script>

	jQuery(document).ready(function() {
		jQuery.post("https://www.cs.colostate.edu/~ct310/yr2017sp/more_assignments/project03masterlist.php", {}, function(data, status) {

			var masterListLen = data.length;
                        var site = "<?php echo $site ?>";
                        var ing = "<?php echo $ing ?>";

                        // for each entry in master list
			for (i = masterListLen - 1; i >= 0; i--) {
                            if (data[i].nameShort == site) {
                                
				// siteImg is the masterlist ajax_ingrimage.php
				var siteImg = data[i].baseURL + "ajax_ingrimage.php";
				// siteDescrip to grab description
            
				//also need cost/price
				var baseURL = data[i].baseURL;
                                var shortName = data[i].nameShort;
                                var siteDescrip = data[i].baseURL + "/ajax_ingredient.php" + "?ing=" + "\"" + shortName + "\"";
                                //var cost = lst[i].cost;
                                //var unit = lst[j].unit;
                            }
                            
                            //document.getElementById("descrip").src = siteDesrip;
                            displayImg(siteImg, ing);

			}
		})
	});
	
	//displays image
	function displayImg(siteImg, ing) {
		$.ajax({
			// url needs to access 
		 	url: siteImg + "?ing=" + "\"" + ing  + "\"" ,
			data: "json",
			success: function(result) {
			     document.getElementById("image").src = "data:image/png; base64, " + result;
			},
			error: function(xhr, status) {  
			     $("randomImg").hide();
			     alert('Unknown error ' + status); 
			}
		})
	}
</script>
