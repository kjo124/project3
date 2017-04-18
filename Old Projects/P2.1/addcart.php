<?php

if(isset($_POST['cart'])){
    $dbh = new PDO("sqlite:./p2db.db");
    $sName = $_SESSION['page'];
    $sPrice = $_SESSION['price'];
    $str = $dbh->prepare("INSERT INTO cart VALUES ('$sName', '$sPrice')");
    $str->execute();
}

?>