<?php
require_once('../db_connect.php');
session_start();
$name = $_POST['sender_name'];
$email = $_POST['sender_email'];
$message = $_POST['sender_message'];






//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'islammahfuz31@gmail.com';                     //SMTP username
    $mail->Password   = 'mfskflqnppayukzm';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

   


    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress("$email", "$name");     //Add a recipient
  


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Message from $name";
    $mail->Body    = "
        <h1>$name</h1>
        <h2>$email</h2>
        <p>$message</p>
    
    ";



    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


$contact_query = "INSERT INTO contacts(name, email, message) VALUES ('$name','$email','$message')";
$contact_query_db = mysqli_query($db_connect, $contact_query);
$_SESSION['success_send'] = 'Your message succsessfully send to admin  !';
header('location:../frontend/index.php?id=#contact');