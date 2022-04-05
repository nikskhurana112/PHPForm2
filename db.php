<?php

$servername = 'localhost';
$dbname = 'members';
$username = 'newuser';
$password = 'password';

try{
  
  $conn = new PDO("mysql:dbname=$dbname; host=$servername", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

}catch(PDOException $e){
  echo "Error: " . $e->getMessage();
}