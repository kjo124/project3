<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>       
						<span class="icon-bar"></span>      
						<span class="icon-bar"></span>                      
					</button>
					<a class="navbar-brand" href="./index.php">Home</a>
				</div>
				
			<div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">
                                <li><a href="./aboutus.php" >About Us</a></li>
                                <li><a href="./ingredient.php?ingredient=Kohlrabi" >Ingredients</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ingredients<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="./cilantro.php" >Cilantro</a></li>
                                        <li><a href="./kohlrabi.php" >Kohlrabi</a></li>
                                        <li><a href="./tumeric.php" >Tumeric</a></li>
                                        
                                    </ul>
                                
                                
                                <?php if(isset($_SESSION['valid'])){ ?>
                                    <li><a href="./cart.php" ><span class="glyphicon glyphicon-shopping-cart"></span></a></li><?php
                                }?>
                                <?php if(isset($_SESSION['valid']) && $_SESSION['type'] == 'admin'){ ?>
                                    <li><a href="./add.php" >Add Ingredient</a></li><?php
                                }?>
                                <?php if(isset($_SESSION['valid'])){ ?>
                                    <li><a href="./showcomments.php" >Comments</a></li><?php
                                }?>
                            </ul>
                             <ul class="nav navbar-nav navbar-right">
                                <li><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            </ul>
			</div>
			</div>
		</nav>
