<?php
require_once 'dbconfig/config.php';
require_once 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

    <title>Register</title>
</head>
<body>
    <section class="vh-100" style="background-image:url('images/signup3.jpg');">  
        <div class="container  h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-6 col-xl-5 order-2 order-lg-1">                                         
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p> 

                                    <form class="mx-1 mx-md-4" action="register.php" method="post">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="username" id="form3Example1c" class="form-control" placeholder="Your Name" />                                                
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="password" id="form3Example4c" class="form-control" placeholder="Password"/>                                                
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password"  name="password2" id="form3Example4cd" class="form-control" placeholder="Confirm Password" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" name="email" id="form3Example3c" class="form-control" placeholder="Your Email" />
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <input type="submit" name="submit_btn" class="btn btn-lg"><br>
                                            <a href="login.php"><input type="button" class="btn btn-lg" id="back_btn" value="Back"/></a>
                                        </div>
           
                                    </form>
                                </div>
                                <div class="col-md-4 d-flex align-items-center order-1 order-lg-2">
                                    <img src="images/signup4.jpg"  class="img-fluid" alt="Sample image" value="Register">
                                </div>
                                <?php
                                    if(isset($_POST['submit_btn'])){
                                        $username=htmlspecialchars($_POST['username']);
                                        $password=htmlspecialchars($_POST['password']);
                                        $password2=htmlspecialchars($_POST['password2']);
                                        $email=htmlspecialchars($_POST['email']);

                                        if(empty($username) || empty($password) || empty($password2) || empty($email)){
                                            echo '<script type="text/javascript"> alert("Fill in all the fields!")</script>';
                                        }else{                                                               
                                            if($password==$password2){
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
                                                        $pdo=null;
                                                        $stmt=null;
                                                        die();                        
                                                    }
                                                
                                                }
        
                                            }else{
                                                echo '<script type="text/javascript"> alert("Passwords does not match")</script>';
                                            }    
                                        }
                                    }    
                                ?>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    
    
</body>
</html>