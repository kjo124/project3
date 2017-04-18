<?php
include 'header.php';
include 'nav.php';
?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<body>
    <h1 align="center">Cart</h1>
    <h4 align="center">go to ingredients page to add to cart</h4>
    <br>
    <table>
        <tr>
            <th>Ingredient</th>
            <th>Price</th>
            <th>ID</th>
        </tr>
	<?php

            $dbh = new PDO("sqlite:./p2db.db");
            $str = $dbh->prepare("SELECT * FROM cart");
            $str->execute();
            $result = $str->fetchAll();

            foreach ($result as $row){
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['price'] . '</td>';
                echo '<td>' . $row['id'] . '</td>';
                echo '</tr>';
            }
            ?></table><?php
	?>
    <br>


    <div>
        <h2 align="center">Remove Items From Cart</h2>
        <br>
        <div align="center"
        <h4>Type the ID of the item you want to remove : </h4>
        <br><br>
        <form action="" method="post">
            <input type="text" name="ing_name"><br>
            <br>
            <input type="submit" value="Remove from Cart" name = "remove">
        </form>
    </div>

    <?php
    if(isset($_POST['remove'])){
        $idToRemove = $_POST['ing_name'];

        $dbh = new PDO("sqlite:./p2db.db");
        $str = $dbh->prepare("DELETE FROM cart WHERE id=$idToRemove");
        $str->execute();
        header("Refresh:0");
    }
    ?>

<?php
include 'footer.php';
?>

	</body>
</html>