<?php
require_once 'dbconfig/config.php';
$id=$_GET['rn'];
try {
    $query="DELETE FROM chatbot_hints WHERE ID='$id'";
    $stmt=$pdo->prepare($query);
    if($stmt->execute()){
        echo "<script>alert('Record deleted from the database')</script>";
    } else{
        echo "<font color='red'>Failed to delete from the db!!";
    }
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
    header ('Location:qna.php');
}
?>

<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost:80/chatbot/qna.php">