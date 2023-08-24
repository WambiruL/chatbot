<?php
require_once 'dbconfig/config.php';

$stmt = $pdo->quote($_POST['txt']);
$sql="SELECT reply from chatbot_hints WHERE question=$stmt";
$result = $pdo->prepare($sql);
$result->execute();
if($result->rowCount() > 0){
	$row = $result->fetch(PDO::FETCH_ASSOC);
	$content = $row['reply'];
}else{
	$content = "Sorry, not able to understand you.";
}
$result->closeCursor();

$added_on=date('Y-m-d h:i:s');
$pdo->prepare("INSERT INTO message(message,added_on,type) VALUES('$stmt','$added_on','user')");
$added_on=date('Y-m-d h:i:s');
$pdo->prepare("INSERT INTO message(message,added_on,type) VALUES('$content','$added_on','bot')");

echo $content;
echo " ";


