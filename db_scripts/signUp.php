<?php
require_once 'connection.php';

$email = $_POST['email'];
$dob = $_POST['date'];
$password = $_POST['password'];

$query = "INSERT INTO `creds` (`email`,`password`,`dob`) VALUES ('$email','$password','$dob');";
if($connn->query($query)){
    echo 1;

}
else {
    echo 0;
}

echo $query;
Redirect('../loginAndSignup/login.php?state=success',true);


?>