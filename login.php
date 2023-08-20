<?php
session_start();
require "dbconfig/config.php";
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>Login</title>
</head>
<body style="overflow-y:hidden;">
    <section class="vh-100 gradient-custom" style="background-image:url('images/signup3.jpg');">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card text-white" style="border-radius: 1rem; background-color:white;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase" style="color:black;">Login</h2>
                                <p class="text-black-50 mb-5">Please enter your Username and Password!</p>

                                <form action="login.php" method="post">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa fa-user fa-lg me-3 fa-fw" style="color:black;"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="username" id="form3Example1c" class="form-control" placeholder="Your Name" />                                                
                                         </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa fa-lock fa-lg me-3 fa-fw" style="color:black;"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" name="password" id="form3Example4c" class="form-control" placeholder="Password"/>                                                
                                        </div>
                                    </div>

                                    <input name="login" class="btn btn-outline-light btn-lg px-5" type="submit">                 
                                </form><br>
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
                                <a href="admin.php"><input type="button" class="btn btn-outline-dark px-5" id="admin_btn" value="Login as Admin"></a>
                            </div>
                        <div>
                            <p class="mb-0 text-black-50">Don't have an account? <a href="register.php" class="text-black-50 fw-bold">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   

    
    
</body>
</html>