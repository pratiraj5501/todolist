<?php
$host ="localhost"; 
$user ="root"; 
$pass =""; 
$db ="to-do-list";

$conn = mysqli_connect($host,$user,$pass,$db);

if ($conn) {
    echo "Connection succesfull";
}
else {
    echo "Connection is failed";
    mysqli_close($conn);
}


?>