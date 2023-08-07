<?php
require_once 'connection.php';

$active_logins = $connn->query("SELECT `loginCount` FROM `login_and_page_views`;");
$active_logins = mysqli_fetch_assoc($active_logins);
$active_logins = $active_logins['loginCount'];


$page_views = $connn->query("SELECT `viewCount` FROM `login_and_page_views`;");
$page_views = mysqli_fetch_assoc($page_views);
$page_views = $page_views['viewCount'];

$totalTasks = $connn->query("SELECT `id` FROM `active_tasks`;");
// $totalTasks = mysqli_fetch_array($totalTasks);
$totalTasks = mysqli_num_rows($totalTasks);

$completedTasks = $connn->query("SELECT `id` FROM `active_tasks` where status=1;");
// $totalTasks = mysqli_fetch_array($completedTasks);
$completedTasks = mysqli_num_rows($completedTasks);


?>  