<?php
require_once 'connection.php';

$newPass = $_POST['NewPassword'];
$query="UPDATE `admin_login` SET password='$newPass' ;";
$connn->query($query);

Redirect('../admin/admin.php',true);
?>