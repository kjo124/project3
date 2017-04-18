<?php
include "header.php";
include "nav.php";
?>

<body>
<h1 align="center">Add Ingredient</h1>
<h4 align="center">Admins only</h4>
<br><br>
<div align="center">
        <form action="" method="post" enctype="multipart/form-data">
            <h4>Ingredient Name:</h4>
            <input type="text" name="name"><br>
            <br>
            <h4>Ingredient Price:</h4>
            <input type="text" name="price"><br>
            <h4>Ingredient Image:</h4>
            <input type="file" name="pic" id="pic"><br>
            <input type="submit" value="Add Ingredient" name = "add">
        </form>
</div>


<?php
if(isset($_POST['add'])){
    $name = $_FILES['pic']['name'];
    $temp_name = $_FILES['pic']['tmp_name'];
    if(isset($name)){
        if(!empty($name)){
            $location = './';
            if(move_uploaded_file($temp_name, $location.$name)){
                echo 'File uploaded successfully';
            }
        }
        $ing_name = $_POST['name'];
        $ing_price = $_POST['price'];

        $dbh = new PDO("sqlite:./p2db.db");
        $str = $dbh->prepare("INSERT INTO ingredients VALUES('$ing_name', '$ing_price', '$name')");
        $str->execute();
        echo 'Added to Database successfuly';

    }
}

include "footer.php";
?>

</body>
