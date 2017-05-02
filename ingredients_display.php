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
$id = $_GET['id'];
$db = new Database();
$ingredient = $db->findIngredient($id);
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

              <!-- <form id ="addCart" class="form-buy" role="form" action="" method="post" align="center" >
                  <div class="button">
                      <button  class = "btn btn-lg btn-primary btn-block" type = "submit" name = "ing" ><span class="glyphicon glyphicon-plus-sign"> Add to cart</span></button>
                  </div>
              </form> -->



      <?php    }
        }
      ?>
			<?php include 'inc/authentication.php';?>
			<?php include 'inc/commenting.php';?>
			<!-- left -->
		</div>
		<div class="col-md-6">
                    <div class="Title" align="center">
                                <h1><?php echo $ingredient->name ?> </h1>
                    </div>
                                <div class="maincontent" align="center">
                                  <?php echo $ingredient->description ?>
                                </div>
			<!-- middle -->
		</div>
		<div class="col-md-3">

                        <img src="uploads/<?php echo $ingredient->image ?>" class="img-circle img-responsive" alt="<?php echo $ingredient->image ?>"/>

			<!-- right -->
		</div>
	</div>
</div>

<?php include 'inc/footer.php';?>
