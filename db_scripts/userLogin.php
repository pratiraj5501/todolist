<?php
require_once "connection.php";

$user = $_POST["username"];
$password = $_POST["password"];

$query = "select * from `creds` where email='$user' and password='$password'";
$result = $connn->query($query);

//Remove this block in the final product
if (mysqli_num_rows($result) > 0) {
    session_start();
    $_SESSION['user'] = $user;
    $result = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $result['user_id'];
    Redirect("../todo.php",true);
}
else {
    mysqli_close($connn); // Testing this line of code
    Redirect('../loginAndSignup/login.php?state=failed');
}



?>