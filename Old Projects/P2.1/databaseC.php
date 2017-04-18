<?php
    try {
        $dbh = new PDO("sqlite:./p2db.db");
        $str = $dbh->prepare("SELECT * FROM USERS");
        $str->execute();
        $str = $str->fetch();
        echo $str['password'];
        echo '<pre class="bg-success">';
        echo 'Connection successful.';
        echo '</pre>';
    } catch(PDOException $e){
        echo '<pre class="bg-danger">';
        echo 'Connection failed (HELP): ' . $e->getMessage();
        echo '</pre>';
        die;
    }

?>