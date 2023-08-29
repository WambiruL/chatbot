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
                <a class="nav-item nav-link active" href="adminmain.php">Chats<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="qna.php">Dataset</a>
                <a class="nav-item nav-link" href="invalid.php">Invalid</a>
                <a class="nav-item nav-link disabled" href="login.php">Sign Out</a>
            </div>
        </div>
    </nav>
	


<!--
<div id="main-wrapper">
		<center>
			<h2><strong>Admin</strong></h2>
			<div class="imgcontainer">
			<img src="imgs/dc.jpg" class="avatar"/>
		</center>
	
	</div>
-->


<body><br><br><br><br><br><br>
	<table align="center" border="1px" style="width: 800px;line-height: 20px">
		<tr>
			<th colspan="4"><h2>Chat record</h2></th>
			<h3></h3>
		<tr>
			<th align="center">id</th>
			<th align="center">message</th>
			<th align="center">Added on</th>
			<th align="center">Type</th>
		</tr>
	<?php
	require_once 'dbconfig/config.php';
		try {
			$sql = "SELECT id,message,added_on,type FROM message";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				while ($row =$stmt->fetch(PDO::FETCH_ASSOC)) {
				echo "<tr><td>".$row["id"]."</td><td>".$row["message"]." </td><td> ".$row["added_on"]." </td><td> ".$row['type']."</td></tr>";
			}
			echo "</table>";
		} else{
			echo "0 result";
		}
		$stmt->closeCursor();
		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	?>

	</table>
</body>
</html>