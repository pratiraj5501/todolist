<?php
require_once "connection.php";

$user = $_POST["username"];
$password = $_POST["password"];

$query = "select * from `creds` where username='$user' and password='$password'";
$result = $conn->query($query);

//Remove this block in the final product
if (mysqli_num_rows($result) > 0) {
    echo "Logged in <br>";
}
else {
    echo "incorrect creds <br>";
}

Redirect("../dashboard.html",true);
mysqli_close($conn); // Testing this line of code


?>