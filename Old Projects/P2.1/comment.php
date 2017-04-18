<?php

$comment = "";

    if(isset($_POST['submit'])){
    $comment = $_POST["comment"];
       $ingName = $_SESSION['ingName'];
        $ingUser = $_SESSION['username'];
       $dbh = new PDO("sqlite:./p2db.db");
       $str = $dbh->prepare("INSERT INTO COMMENTS (ingredient, user, comment) VALUES ('$ingName','$ingUser','$comment')");
       $str->execute();
       $str = $str->fetch();
    }


?>
  
  <form method="post" action="">
    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
    <input type="submit" name="submit" value="Submit"> 
  </form>
  
  
  <?php
  echo $comment;
  ?>
