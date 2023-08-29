<?php
require_once 'dbconfig/config.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <style >
    	body{
		background-image:url('images/back.jpg');
		background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
	}
	

	table{
		color: black;
		border-radius: 19px;
        background-color:white
		
		
	}
	#button 
	{
		background-color:white;
		color: black;
		height: 32px;
		width: 145px;
		border-radius: 25px;
		font-size: 16px;
        cursor: pointer;
	}
    #button:hover{
        background-color:#00dfc0;
    }
    #clear{
        background-color:white;
		color: black;
		height: 32px;
		width: 80px;
		border-radius: 25px;
		font-size: 16px;
        cursor: pointer;
        text-align:center;
        position: relative;
        top:-20px;

    }
    #clear:hover{
        background-color:#00dfc0;
    }

    .form-control{       
    border: none;
    box-shadow:0 0 15px 0 rgba(29,25,0,0.25);
    width: 268px !important; 
    height: 50px !important;
        
    }
    input{
        text-align:center;
    }

    
</style>
</head>
<body>
    <br><br><br><br>
    <form action="" method="POST">
        <table border="0" bgcolor="black" align="center" cellspacing="50">            
            <tr>
                <td>Id</td>
                <td><input type="text" class="form-control" value="" name="id" placeholder="Type Id here..."></td>
            </tr>

            <tr>
                <td>Question</td>
                <td><input type="text"class="form-control" value="" name="question" placeholder="Type your query here..."></td>
            </tr>

            <tr>
                <td>Reply</td>
                <td><input type="text" class="form-control" value="" name="reply" placeholder="Type your response here..."></td>
            </tr>

            <tr>
                <td colspan="3" align="center"><input type="submit" id="button" name="submit" value="Insert"/></td>
            </tr>
            <tr>
                <td colspan="3" align="center"><button type="clear" id="clear" value="Clear">Clear</button></td>
            </tr>
        </table>
    </form>  
    
    <?php 
      if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $question=$_POST['question'];
        $reply=$_POST['reply'];

        try{
            if(empty($id) || empty($question) || empty($reply)){
                echo '<script type="text/javascript">alert("Fill in all the fields!")</script>';
            }else{
                $query="INSERT INTO chatbot_hints VALUES ('$id','$question','$reply')";
                $stmt=$pdo->prepare($query);
                if($stmt->execute()){
                    echo '<script type="text/javascript">alert("Success!")</script>';
                }else{
                    echo '<script type="text/javascript">alert("throw new PDOException($e->getMessage())")</script>';
                }
                $stmt->closeCursor();
                
            }
            
        }catch(PDOException $e){
            die("Query failed: " . $e->getMessage());
        }
      }
    ?>

    
    
</body>
</html>