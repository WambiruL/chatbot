<?php
require_once 'dbconfig/config.php';
$rn=$_GET['rn'];
$ques=$_GET['ques'];
$rep=$_GET['rep'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
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
    <br><br><br><br><br><br><br>
    <form action="" method="GET">
        <table border="0" bgcolor="black" align="center" cellspacing="50">
            <tr>
                <td>Id</td>
                <td><input type="text" class="form-control" value="<?php echo "$rn" ?>" name="id"></td>
            </tr>
            <tr>
                <td>Question</td>
                <td><input type="text" class="form-control" value="<?php echo "$ques" ?>" name="question"></td>
            </tr>
            <tr>
                <td>Id</td>
                <td><input type="text" class="form-control" value="<?php echo "$rep" ?>" name="reply"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" id="button" name="submit" value="Update Details"></td>
            </tr>
        </table>
        <?php 
        if(isset($_GET['submit'])){
            $id=$_GET['id'];
            $question=$_GET['question'];
            $reply=$_GET['reply'];

            $query="UPDATE chatbot_hints SET id='$id', question='$question', reply='$reply' WHERE id='$id'";
            $stmt=$pdo->prepare($query);
            if($stmt->execute()){
                echo "<script>alert('Record Updated')</script>";
                    
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost:80/chatbot/qna.php">

           <?php 
            }else{
                echo "Failed to Update Record";
            }

        } 
    
    ?>
    </form>  

</body>

</html>