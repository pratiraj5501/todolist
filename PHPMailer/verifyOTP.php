<?php
    session_start();
    require_once "../db_scripts/connection.php";
    if (isset($_GET["OTP"])) {

    $generatedOTP = $_SESSION['generatedOTP'];
    $enterOTP = $_GET["OTP"];

    if ($generatedOTP == $enterOTP) {
        echo "<a>The OTP Matched</a>";
        Redirect("../loginAndSignup/changePassword.php",true);           
    }
    else {
        echo "<a> Wrong OTP , Try Again </a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
</head>
<body>
    <form action="verifyOTP.php" method="get">
        <input type="text" required name="OTP" placeholder="Enter the OTP">
        <button type="submit">Submit</button>
    </form>
</body>
</html>