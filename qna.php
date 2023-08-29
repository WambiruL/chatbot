<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
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
                <a class="nav-item nav-link active" href="qna.php">Dataset<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="invalid.php">Invalid</a>
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

    <a href="insert.php"><button type="button" id="insert_btn"  value="Insert/Add" align="center">Insert/Add</button></a>
    <style>
	
	#insert_btn{
			padding: 2px;
			height: 50px;
			width: 90px;
			color: black;
			background-color: white;
            border:2px solid black;
            cursor:pointer;
	}
    #insert_btn:hover{
        color:white;
        background-color:black;

    }
</style>
    <table cellspacing="5" align="center" border="1px" style="width:800px; line-height:40px">
        <tr>
            <th colspan="5"><h2>Chatbot Dataset</h2></th>
                <h3></h3>
        </tr>
            
        <tr>
            <th width="20px">id</th>
            <th align="center">Query</th>
            <th align="center">Reply</th>
            <th colspan="2" align="center">Operation</th>
        </tr>   
        <?php
            require_once 'dbconfig/config.php';
            $query="SELECT id, question, reply FROM chatbot_hints";
            $stmt=$pdo->prepare($query);
            $stmt->execute();
            if($stmt->rowCount()>0){
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["question"]."</td>
                <td>".$row["reply"]."</td>
                <td><a href='update.php?rn=$row[id]&ques=$row[question]&rep=$row[reply]'>Edit/Update</td>
                <td><a href='delete.php?rn=$row[id] onclick='return checkdelete()'>Delete</td>
                </tr>";
            }
            }else{
            echo "0 result";
            }
            $stmt->closeCursor();
        ?> 
    </table>
    <script>
        function checkdelete(){
            return Confirm('Are you sure you want to delete this record?');
        }
    </script>
    
</body>
</html>