<?php
session_start(); // for the random opt confirmation
require_once "..//db_scripts/fetchSmtpToken.php";
require_once "../db_scripts/connection.php";

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$getemail = $_POST['email'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $serverUser; // Get a new email for to-do list site
    $mail->Password   = $serverPass; //fectch this from the database not here directly
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('busxnoreplay@gmail.com', 'Contact Form');
    $mail->addAddress($getemail, 'TO-Do-List');     //Add a recipient


    $random_number = '';
    for ($i = 0; $i < 6; $i++) {
        $random_number .= rand(0, 9);
    }

    $_SESSION['generatedOTP'] = $random_number;
    $_SESSION['userEmail'] = $getemail;

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'OTP for resetting the password';
    $mail->Body    = "OTP: <b>'$random_number'</b>";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send(); // sends the email.

    echo 'Message has been sent';

    //Redirecting to the confirmation page
    Redirect("verifyOTP.php",true);

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}