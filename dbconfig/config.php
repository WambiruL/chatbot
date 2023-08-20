<?php

$host='localhost';
$dbname='chatbot';
$dbusername='root';
$dbpassword='';

try {
    $pdo=new PDO("mysql:host=$host; dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::EERMODE_EXCEPTION);
   
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
    
}

