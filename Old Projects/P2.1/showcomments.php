<?php
include "header.php";
include "nav.php";
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
    <h1 align="center">Comments</h1>
    <br>
    <table>
        <tr>
            <th>Ingredient</th>
            <th>User</th>
            <th>Comment</th>
            <th>ID</th>
        </tr>
        <?php

        $dbh = new PDO("sqlite:./p2db.db");
        $str = $dbh->prepare("SELECT * FROM COMMENTS");
        $str->execute();
        $result = $str->fetchAll();

        foreach ($result as $row){
            echo '<tr>';
            echo '<td>' . $row['ingredient'] . '</td>';
            echo '<td>' . $row['user'] . '</td>';
            echo '<td>' . $row['comment'] . '</td>';
            echo '<td>' . $row['id'] . '</td>';
            echo '</tr>';
        }
        ?></table><?php
    ?>
    <?php if($_SESSION['type'] == 'admin'){ ?>
        <div>
            <h2 align="center">Remove Comments</h2>
            <h4 align="center">admins only</h4>
            <div align="center"
            <h4>Type the ID of the Comment you want to remove : </h4>
            <br><br>
            <form action="" method="post">
                <input type="text" name="ing_name"><br>
                <br>
                <input type="submit" value="Remove Comment" name = "remove">
            </form>
        </div>
    <?php } ?>

    <?php
    if(isset($_POST['remove'])){
        $idToRemove = $_POST['ing_name'];

        $dbh = new PDO("sqlite:./p2db.db");
        $str = $dbh->prepare("DELETE FROM COMMENTS WHERE id=$idToRemove");
        $str->execute();
        header("Refresh:0");
    }
    ?>



    <br><br>
</body>

<?php
include "footer.php";
?>
