<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$email=$_POST["email"];
$name=$_POST["name"];
$number=$_POST["number"];
$message=$_POST["message"];

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bookarenaplay@gmail.com';                     //SMTP username
    $mail->Password   = 'cgjc jmsh ivvr wtcq';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    //Recipients

    $mail->setFrom('bookarenaplay@gmail.com', 'ArenaPlay');
    $mail->addAddress('bookarenaplay@gmail.com', 'ArenaPlay');
    $mail->Subject = 'Message from ArenaPlay user : '.$name;
    $mail->Body    = $message. ' <b>in bold!</b>
    <br> <br> User details : 
    <br> Name: '.$name.'
    <br> Email: '.$email.'
    <br> Phone Number: '.$number.'
    ';


    // $mail->setFrom('paudelnabin11@gmail.com', 'Nabin');
    // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    // $mail->addAddress('pnabin73@gmail.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Message from ArenaPlay user :'.$name;
    $mail->Body    = '<b>'.$message.'</b>'. ' 
    <br> <br> User details : 
    <br> Name: '.$name.'
    <br> Email: '.$email.'
    <br> Phone Number: '.$number.'
    ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->SMTPDebug = 0; // Set the debug level (0 for no output, 1 for basic output, 2 for detailed output)


    $mail->send();
    echo "<script>alert('Your message has been sent.'); window.location.href='../../index.php';</script>";
    // echo "<script>
    // alert('Your message has been sent.');
    // windows.location.href='../../index.php';
    // </script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
$mail->smtpClose();

