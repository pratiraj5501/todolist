<?php
require_once 'connection.php';

$email = $_POST['email'];
$dob = $_POST['date'];
$password = $_POST['password'];

$query = "INSERT INTO `creds` (`email`,`password`) VALUES ('$email','$password');";
$conn->query($query);
$query = "SELECT `user_id` FROM `creds` WHERE email=$email";
$res = $conn->query($query);
$res = mysqli_fetch_assoc($res);
$res = $res['user_id'];
$query = "INSERT INTO `user` (`user_id`,`dob`) VALUES ('$res','$dob');";

Redirect('../loginAndSignup/login.php?state=success',true);


?>