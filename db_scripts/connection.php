<?php
$host ="localhost"; 
$user ="root"; 
$pass =""; 
$db ="to-do-list";

$connn = mysqli_connect($host,$user,$pass,$db);

if (!$connn) {
    echo "Connection is failed <br>";
    mysqli_close($connn);
}

//A function to redirect users to other web-pages
function Redirect($url, $permanent = false)
{ //Redirects to given page
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}


?>