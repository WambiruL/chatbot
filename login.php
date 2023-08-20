<?php
session_start();
require "dbconfig/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form class="my_form" action="login.php" method="post">
        <label><b id="login_name">Username:</b></label><br>
        <input name="username" id="us" type="text" placeholder="Enter Username Here..."><br>
        <label><b id="login_pass">Password:</b></label><br>
        <input name="password" id="pass" type="password" placeholder="Your Password"><br>
        <input name="login" type="submit" id="login_btn" value="Login"><br>
        -OR-<br>
        <a href="register.php"><input type="button" id="register_btn" value="Register"><br></a>
        <a href="admin.php"><input type="button" id="admin_btn" value="Login as Admin"></a>    
    </form>

    <?php
    if(isset($_POST['login'])){
        $username=htmlspecialchars($_POST['username']);
        $password=htmlspecialchars($_POST['password']);

        $query="SELECT * FROM users WHERE username=:username;";
        $stmt=$pdo->prepare($query);
        $stmt->bindparam(":username",$username);
        $stmt->execute();
        if($stmt->rowCount()>0){
            //valid
            $_SESSION['username']=$username;
            header('location:homepage.php');
        }else{
            //invalid
            echo '<script type="text/javascript">alert("Invalid Credentials")</script>';
        }
    }
    ?>
    
</body>
</html>