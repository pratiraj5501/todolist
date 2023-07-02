<?php
require_once "connection.php";

$user = $_POST["username"];
$password = $_POST["password"];

$query = "select * from `creds` where username='$user' and password='$password'";
$result = $conn->query($query);

if (mysqli_num_rows($result) > 0) {
    echo "Logged in <br>";
}
else {
    echo "incorrect creds <br>";
}
?>