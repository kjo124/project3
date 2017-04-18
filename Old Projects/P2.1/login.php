<?php
ob_start();
$loginPage = TRUE;
include 'header.php';
include 'nav.php';
?>
	<body>
		
	<!-- create three coulumn with lg and md size-->
		
		<div class="container-fluid">
			<div class="row visible-on">
                            <div class="col-md-4">
                                <img src="tumeric2.jpg" class="img" alt="tumeric" width="250" height="200"></img>
                                <img src="kohlrabi.jpg" class="img" alt="kohlrabi" width="250" height="200"></img>
                                <img src="cilantro.jpg" class="img" alt="cilantro" width="250" height="200"></img>
                                <p> Images from <a href=https://draxe.com/cilantro-benefits/>draxe.com</a> , <a href=http://www.simplyrecipes.com/kohlrabi/>simplyrecipes</a> , and <a href=https://d2v4vjmuxdiocn.cloudfront.net/wp-content/uploads/Curmin-image.jpg>cloudfront.net</a> </p>
                            </div>
            
					
	<!-- Add Main Content here -->
                <div class="col-lg-5">
                        <div class="Title">
                        <h1>Log In</h1> 
                            <h4>Welcome Users.
                            </h4>
                        </div>
                        <div class="maincontent">
                            <div class="loginFormat">
                                <form action="" method="post">
                                    <p>User Name:</p>
                                    <select name = "username">
                                        <option value="ct310">ct310</option>
                                        <option value="fred">fred</option>
                                    </select>
                                    <br><br>
                                    <p>Password:</p><input type="password" name="pass"><br><br>
                                    <input type="submit" value="Login" name = "submit">
                                </form>
                                <p><a href="forgotpass.php">Forgot Password</a></p>
                                <br><br><br>
                            </div>
						<?php
						date_default_timezone_set('America/Denver');
						$msg = '';
						if(isset($_POST['submit'])){
							$user = $_POST['username'];
							$pass = $_POST['pass'];
                            //connect to Database
                            $dbh = new PDO("sqlite:./p2db.db");
                            $str = $dbh->prepare("SELECT * FROM USERS WHERE NAME = '$user'");
                            $str->execute();
                            $str = $str->fetch();
							if($str['password'] === $pass){
                                $_SESSION['valid'] = true;
                                $_SESSION['type'] = $str['type'];
                                $_SESSION['email'] = $str['email'];
                                $_SESSION['username'] = $str['name'];
                                $_SESSION['timeout'] = date("g:ia");
                                header("Refresh:0");
                            }

						}
						?>
						<br><br>

                        </div>
                </div>
		</div>
		</div>
<?php
include 'footer.php';
?>

	</body>
