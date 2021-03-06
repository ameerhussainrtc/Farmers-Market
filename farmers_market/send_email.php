<?php
error_reporting(0);
$mysqli = new mysqli("localhost","root","","farmers_market");
$email =$mysqli -> real_escape_string($_POST['email']);
$user_type =$mysqli -> real_escape_string($_POST['user_type']);
require("connection.php");
$sql="SELECT email FROM ".$user_type."s WHERE email='$email'";
$result=$mysqli->query($sql);
if(!$result || $result->num_rows==0){
    echo "This email is not registered";
    die();
}
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    set_time_limit(60);
    //Server settings
    $mail->isSMTP(true);                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'mailID';                     // SMTP username
    $mail->Password   = 'password';      

    //Set who the message is to be sent from
    $username = $mysqli -> real_escape_string($_POST['username']);
    $mail->setFrom('hellobabai2136@gmail.com', 'Email Auth Farmers Market');
        //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress($email);               // Name is optional
    $mail->addReplyTo('hellobabai2136@gmail.com', 'Farmers market');                         // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       =465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients       // Name is optional
    //$mail->addCC('hellobabai2136@gmail.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'OTP for Farmers market';
    $_SESSION['otp']=rand();
    $mail->Body    = "Your OTP is <b>".$_SESSION['otp']."</b>";
    $mail->AltBody = "Your OTP is ".$_SESSION['otp'];
    $mail->send();
    $_SESSION['email']=$email;
    echo 'success';
} catch (Exception $e) {
    echo "Mail can't be send. Check your mail ID";
}
?>