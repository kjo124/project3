<?php
    include "header.php";
    include "nav.php";
?>

<body>
<h1 align="center">Reset your password</h1>
<form action="" method="post">
    Password: <input type="password" name="pass">
    <br>
    Confirm Password: <input type="password" name="confirm">
    <br><br>
    <div><input type="submit" name="reset" value="Reset"/></div>
</form>
</body>

<?php
        if(isset($_POST['reset'])){
            $pass = strip_tags($_POST['pass']);
            $confirm = strip_tags($_POST['confirm']);

            if($pass === $confirm){
                echo "passwords do not math eachother";
            } else {
                $dbh = new PDO("sqlite:./p2db.db");
                $str = $dbh->prepare("UPDATE USERS SET PASSWORD='$password' WHERE NAME='$user'");
                echo "Your password has been reset";
            }
        }
