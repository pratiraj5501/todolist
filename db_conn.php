<?php 

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "todo";

try {
    $conn2 = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}