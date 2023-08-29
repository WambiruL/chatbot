<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Admin Portal</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#00dfc0;">
        <a class="navbar-brand" href="#">iSOS BOT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="adminmain.php">Chats</a>
                <a class="nav-item nav-link" href="qna.php">Dataset</a>
                <a class="nav-item nav-link active" href="invalid.php">Invalid<span class="sr-only">(current)</span></a>
                <form class="myform" action="login.php" method="post">
                <input name="logout" type="submit" class="btn btn-outline-warning" id="logout_btn" value="Log Out"/><br>			
		        </form>
                <?php
                	if(isset($_POST['logout'])){
				        session_destroy();
                        header('location:login.php');
			        }
		        ?>

            </div>
        </div>
    </nav>

    <table align="center" border="1px" style="width:800px; line-height:20px">
        <tr>
            <th colspan="2"><h2>Invalid</h2></th>
            <h3></h3>
        </tr>
        <tr>
            <th align="center">id</th>
            <th align="center">Invalid query/response</th>
        </tr>

        <?php
            require_once 'dbconfig/config.php';
            try {
                $query="SELECT id,messages FROM invalid";
                $stmt=$pdo->prepare($query);
                $stmt->execute();
                if($stmt->rowCount()>0){
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr><td>".$row["id"]."</td><td>".$row["messages"]."</td></tr>";
                    }
                }else{
                    echo "0 result";
                }
                $stmt->closeCursor();
            } catch (PDOException $e) {
                die("Query failed: " . $e->getMessage());             
          } 
        
        ?>

    </table>
    
</body>
</html>