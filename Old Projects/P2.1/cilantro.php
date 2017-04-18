<?php
include 'header.php';
include 'nav.php';
$_SESSION['page'] = "Cilantro";
$_SESSION['price'] = "$0.58 /lb"
?>
<body>

                    <div class="container-fluid">
                        <div class="row visible-on">
                            <div class="col-md-3">
                                <img src="cilantro2.jpg" class="img" alt="cilantro" width="250" height="375">
                            </div>
                            
                            <div class="col-md-5">
                                    <div class="Title">
                                        <h1>Cilantro</h1> 
                                    </div>
                                <div class="maincontent">    
                                    <p> Cilantro is also known as coriander. </p><p>Coriander is native to regions spanning from southern Europe and northern Africa to southwestern Asia. It is a soft plant growing to 50 cm (20 in) tall. The leaves are variable in shape, broadly lobed at the base of the plant, and slender and feathery higher on the flowering stems. The flowers are borne in small umbels, white or very pale pink, asymmetrical, with the petals pointing away from the center of the umbel longer (5–6 mm or 0.20–0.24 in) than those pointing toward it (only 1–3 mm or 0.039–0.118 in long). The fruit is a globular, dry schizocarp 3–5 mm (0.12–0.20 in) in diameter.</p>
                                    <p> This is from <a href=https://en.wikipedia.org/wiki/Coriander>wikipedia.com</a></p>
                                </div>	
                            </div>
                            <div class="col-md-4 col-lg-2">
                            <?php
                                if(isset($_SESSION['valid']) && $_SESSION['valid'] == true){
								    include 'comment.php'; ?>
                                    <form action="" method="post">
                                        <input type="submit" value="Add to cart" name = "cart">
                                    </form>
                                <?php
							}
							else{
								echo 'please <a href="./login.php">login</a> to comment or add to cart';
							}
                            ?>
                            </div>
                        </div>
                     </div>


<?php
    if(isset($_POST['cart'])){
        $dbh = new PDO("sqlite:./p2db.db");
        $sName = $_SESSION['page'];
        $sPrice = $_SESSION['price'];

        $query = "INSERT INTO cart
              (name, price)
              VALUES
              ('$sName', '$sPrice')";

        $str = $dbh->prepare($query);
        $str->execute();
    }
    include 'footer.php';
?>

	</body>
</html>
