<!-- A Common Header (Title and Logo), Footer and Navigation elements on all pages - Please implement using the PHP include tag. -->
<!-- links -->
<!-- <a href="index.php">Home</a> -->
<!-- <a href="AboutUs.php">About Us</a> -->
<!-- <a href="Cabbage.php">Cabbage</a> -->
<!-- <a href="Eggplant.php">Eggplant</a> -->
<!-- <a href="Leek.php">Leek</a> -->

<nav class="navbar navbar-inverse">
  	<div class="container-fluid">
		<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
      		<a class="navbar-brand" href="#">Tasty</a>
    	</div>
    	<div class="collapse navbar-collapse" id="myNavbar">
     		<ul class="nav navbar-nav">
     			<li><a href="index.php">Home</a></li>
     			<li><a href="AboutUs.php">About Us</a></li>
          <li><a href="createData.php">Drop & Create Databases</a></li>
          <li><a href="ingredients_ajax_pagination.php">Ingredients Page</a></li>
      		</ul>
      		 <?php
                if (isset($_SESSION['userType'])){
                if ($_SESSION['userType'] == "Administrator"){?>
      		<ul class="nav navbar-nav navbar-right">
                    <li><a href="./addIngredients.php"><span class="glyphicon glyphicon-plus"></span> Add ingredient</a></li>
                    </ul>
                    <?php } ?>
                <?php
                if ($_SESSION['userType'] == "Customer"){?>
      		<ul class="nav navbar-nav navbar-right">
                    <li><a href="./shopping_cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> cart</a></li>
                    </ul>
                    <?php } ?>
                  <?php } ?>

    	</div>
  	</div>
</nav>
