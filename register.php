<?php
require_once 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form class="reg_form" action="register.php" method="post">
        <label><b id="name">Username:</b></label><br>
        <input name="username" type="text" id="ruser" placeholder="Username" required><br>
        <label><b id="pass">Password:</b></label><br>
        <input name="password" type="password" id="password" placeholder="Password" required><br>
        <label><b id="pass2">Confirm Password:</b></label><br>
        <input name="password2" type="password" id="password2" placeholder="Confirm Password" required><br>
        <label><b id="email">Email:</b></label><br>
        <input name="email" type="email" id="email" placeholder="Email" required><br>
        <input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"><br>
        <a href="index.php"><input type="button" id="back_btn" value="Back"></a>
    </form>

    <?php
        if(isset($_POST['submit_btn'])){
            $username=htmlspecialchars($_POST['username']);
            $password=htmlspecialchars($_POST['password']);
            $password2=htmlspecialchars($_POST['password2']);
            $email=htmlspecialchars($_POST['email']);

            if($password1==$password2){
                $query="SELECT * FROM users WHERE username=:username;";
                $stmt=$pdo->prepare($query);
                $stmt->bindparam(":username", $username);
                $stmt->execute();
                if($stmt->rowCount()>0){
                    echo '<script type="text/javascript"> alert("User already exists. Try another Username")</script>';
                    $pdo=null;
                    $stmt=null;
                    die();
                }else{
                    $query="INSERT INTO users(username,password,email) VALUES(:username,:password,:email);";
                    $stmt=$pdo->prepare($query);
                    $options=[
                        'cost'=>12
                    ];
                    $hashedPwd=password_hash($password,PASSWORD_BCRYPT, $options);
                    $stmt->bindparam(":username",$username);
                    $stmt->bindparam(":password",$hashedPwd);
                    $stmt->bindparam(":email",$email);
                    if($stmt->execute()){
                        echo'<script type="text/javascript">alert("User Registered. Go to the login page to login")</script>';
                        header("Location:login.php?signup=success");

                    }else{
                        echo '<script type="text/javascript">alert("throw new PDOException($e->getMessage())")</script>';
                        
                    }
                    $pdo=null;
                    $stmt=null;
                    die();
                }
        
            }else{
                echo '<script type="text/javascript"> alert("Passwords does not match")</script>';
            }    
        }
    ?>
    
</body>
</html>