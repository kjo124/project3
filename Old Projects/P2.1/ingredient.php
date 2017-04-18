<?php
include "header.php";
include "nav.php";

?>

<body>
<?php
    $ingName = $_GET['ingredient'];
    $dbh = new PDO("sqlite:./p2db.db");
    $str = $dbh->prepare("SELECT * FROM ingredients WHERE NAME='$ingName'");
    $str->execute();
    $str = $str->fetch();

    $ingPrice = $str['price'];
    $ingImage = $str['image'];

    $_SESSION['ingName'] = $ingName;
    $_SESSION['ingPrice'] = $ingPrice;
?>

<div class="container-fluid">
    <div class="row visible-on">
        <div class="col-md-3">
            <?php  echo '<img src="'.$ingImage.' " class="img" alt="'.$ingName.'" width="250" height="375">'   ?>
        </div>

        <div class="col-md-5">
            <div class="Title">
                <?php echo '<h1>'.$ingName.'</h1>'?>
            </div>
            <div class="maincontent">
                <h3 align="center">Price:</h3><br>
                <?php echo '<h4 align="center">'.$ingPrice.'</h4><br>' ?>
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
            <br><br>
            <p>Other ingredients in Database:</p>
            <table>
                <tr>
                    <th>Name:</th>
                </tr>
                <?php

                $dbh = new PDO("sqlite:./p2db.db");
                $str = $dbh->prepare("SELECT NAME FROM INGREDIENTS");
                $str->execute();
                $result = $str->fetchAll();

                foreach ($result as $row){
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '</tr>';
                }
                ?></table><?php
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
              ('$ingName', '$ingPrice')";

    $str = $dbh->prepare($query);
    $str->execute();

}
include 'footer.php';
?>

</body>
