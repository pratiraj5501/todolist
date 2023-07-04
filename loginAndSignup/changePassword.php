<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Paswword</title>
</head>

<body>
    <form action="" method="get">
        <label for="newPassword">Enter New Password</label>
        <input type="text" required name="newPassword">
        <br><br>
        <label for="confirmPassword">Confirm Password</label>
        <input type="text" required name="confirmPassword">
        <br><br>
        <button type="submit">Change Password</button>
    </form>
</body>

</html>

<?php
session_start();
require_once "../db_scripts/connection.php";
if (isset($_GET['newPassword']) and isset($_GET['newPassword'])) {

    $confirmPass = $_GET['confirmPassword'];
    $newPass = $_GET['newPassword'];
    $userEmail = $_SESSION['userEmail'];

    
    if ($newPass == $confirmPass) {
        $query = "select user_id from `user` where email='$userEmail'";
        $fetched = $conn->query($query);
        
        $fetchedUserId = mysqli_fetch_array($fetched);

        $finalId = $fetchedUserId[0];

        $query2 = "UPDATE `creds` SET `password`='$confirmPass' WHERE `user_id`='$finalId'";

        if (mysqli_query($conn,$query2)) {
            echo "Password Updated";
            session_abort();
            Redirect("login.html");
        }
        else {
            echo "Password Updation Failed";
        }
    } else {
        echo "Password do no match";
    }
}
?>