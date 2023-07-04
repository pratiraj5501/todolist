<?php
require_once "connection.php";

$query = "SELECT * FROM `token_store`";
$tokenObj = $conn->query($query);

$tokenArray = mysqli_fetch_array($tokenObj);

$serverUser = $tokenArray[0];
$serverPass = $tokenArray[1];

mysqli_close($conn);

?>