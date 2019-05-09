<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'onlinetest';
// Create DSN
$dsn = "mysql:host=$dbhost;dbname=$dbname";
try{
    $conn = new PDO($dsn, $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 



catch(PDOException $e){
    die('Failed to connect to database'.$e->getMessage());
}

 ?>
