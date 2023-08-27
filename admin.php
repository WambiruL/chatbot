<?php
session_start();
require_once 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

    <title>ADMIN</title>
</head>

<body  style="background-image:url('images/signup3.jpg');">
    <div class="main">
        <p class="sign" align="center">Admin Login</p>
        <form class="form1" action="adminlogin.php" method="post">
            <input class="un" name="username" type="text" align="center" placeholder="Username">
            <input class="pass" name="password" type="password" align="center" placeholder="Password">
            <button type="submit" class="submit" name="submit" align="center">Log In</button>
        </form>                    
    </div>  
</body>                
</html>