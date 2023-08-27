<?php
require_once 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Invalid Response</title>
    <!-- <link href="css/styles.css" rel="stylesheet"> -->
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

    #invalid{
       
       
    border: none;
    box-shadow:0 0 15px 0 rgba(29,25,0,0.25);
    width: 268px !important; 
    height: 105px !important;
        
    }
    input{
        text-align:center;
    }

    
</style>


</head>
<body><br><br><br><br>
    <form action="invalidans.php" method="POST">
        <table border="0" bgcolor="black" align="center" cellspacing="50">
            <div id="main-wrapper">
                <center>
                    
                        <img src="images/bot.png" class=""/>
                    
		        </center>
	        </div>

            <tr>
                <td class="label">Invalid Response</td>
                <td><textarea  id="invalid" name="messages" placeholder="Type your query here..."></textarea></td>
			
		    </tr>
            <tr>
                <td  colspan="3" align="center"><input type="submit" id="button" name="submit" value="Report as Invalid"/></td>                
	        </tr>
            <tr>
            <td  colspan="3" align="center"><button type="clear" id="clear" value="Cancel">Cancel</button></td>

                
	        </tr>


        </table>
	</form>
</body>
</html>


<?php

if(isset($_POST['submit']))
{
	// $id = $_POST['id'];
	$messages = $_POST['messages'];

	try {
        if(empty($messages)){
			echo '<script type="text/javascript"> alert("Fill in all the fields!") </script>';
        }else{
		$sql = "INSERT INTO invalid() VALUES(NULL, '$messages')";
		$stmt = $pdo->prepare($sql);
        
            if ( $stmt->execute() ) {
                echo '<script type="text/javascript"> alert("Success!") </script>';
            } else {
                echo '<script type="text/javascript"> alert("throw new PDOException($e->getMessage())") </script>';
            } 
            $stmt->closeCursor();
        }
		

	} catch (PDOException $e) {
		throw new PDOException ($e->getMessage());
	}
}
?>
	