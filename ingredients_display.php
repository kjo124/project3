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
require_once "inc/page_setup.php";
$ing = $_GET['ing'];
$site = $_GET['site'];
?>
<!DOCTYPE html>
<!-- A Common Header (Title and Logo), Footer and Navigation elements on all pages - Please implement using the PHP include tag. -->
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Author" content="Kyle Odin & Derek Law">
<meta name="Description" content="CT310 Project #3">
<meta name="Keywords" content="CT310 Project #3">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="assets/css/styles.css">
  <script src="assets/jquery.min.js"></script>
  <script type="text/javascript" src="display.js"></script>
	<title>CT310 Project #3</title>
</head>
<!-- Start of page Body  -->
<body>
<div class="jumbotron">
    <h1>Derek & Kyle Ingredients <img src="assets/img/Logo.png" class="img-circle" alt="Logo" width="150" height="150"></h1>
</div>
<?php include 'inc/nav.php';?>
<div class="content">

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
                array_push($_SESSION['cart_items'], $ing);
                echo "\n";
                echo $ing . " added to Cart!";
              } else {
                //Session is not set, setting session now
                $cart_array=array($ing);
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
                    <div class="Title" align="center">
                                <h1 id="ing"><?php echo $ing ?></h1>
																<h1 id="site"><?php echo $site ?></h1>
                    </div>
                    <div class="maincontent" align="center">
											<p id="description"></p>
                    </div>
										<br>
					          <p>
					          Status of Federation AJAX call: <span id="outp1"> not responding </span>
					          </p>
			<!-- middle -->
		</div>
		<div class="col-md-3">
				<image id="image" class="img-circle img-responsive" alt="<?php echo $ing ?>"></image>
				<p id="error"></p>

			<!-- right -->
		</div>
	</div>
</div>

<?php include 'inc/footer.php';?>
