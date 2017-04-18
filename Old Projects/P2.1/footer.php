

<div class="footer">
        <?php  
        if(isset($_SESSION['valid']) && $_SESSION['valid'] == true){
			echo $_SESSION['type'],' ', $_SESSION['username'], ' logged in at ', $_SESSION['timeout'], ' click <a href="./logout.php">here</a> to logout.';

		}
		else{
			echo 'Not Logged in, Please <a href="login.php">Login</a> to use your cart and comment.';
		}
        ?>
        
        
	<p> This site is part of a CSU <a href="https://www.cs.colostate.edu/~ct310/yr2017sp/">CT 310</a> Course Project.</p>
	

