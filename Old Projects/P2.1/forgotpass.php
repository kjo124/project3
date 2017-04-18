<?php
include 'header.php';
include 'nav.php';
?>
    <body>
    <h1 align="center">Reset Password</h1>
    <br><br><br>
    <form action="#", method="POST">
        <div align="center">
            Username: <input type=text placeholder="Enter Username" name='user' required><br/>
            <input type=submit value = 'Submit' name='submit'><br/><br/>
        </div>
    </body>
    <?php
    if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $dbh = new PDO("sqlite:./p2db.db");
        $str = $dbh->prepare("SELECT EMAIL FROM USERS WHERE NAME = '$user'");
        $str->execute();
        $str = $str->fetch();

        $rnd = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz");
        $msg = "Please reset your password with the following link: $host$uri/reset.php?key=$rnd";
        $subj = "$host$uri Password Reset";
        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: ct310 p2, jack and devin <jfmccoy@rams.colostate.edu>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($str['email'],$subj,$msg,$headers);

        echo $str['email'];
    }
    ?>

<?php
include 'footer.php';
?>