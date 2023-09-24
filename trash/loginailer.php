<?php
session_start();
include("../include/dbcon.php");

if (isset($_SESSION['SN'])) {
    header("Location: ../booking.php");
    exit();
}

$name = $_POST['name'];
$phone = $_POST['phone'];

// Check if the phone number already exists in the database
$stmt = $conn->prepare("SELECT * FROM register WHERE phone = ?");
$stmt->bind_param("s", $phone);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script>alert('The phone number you entered has already been registered.');</script>";
    echo "</br><p>Go to <a href='../login.php'>Login</a> page</p>";
    exit();
}

$email = $_POST['email'];

// Check if the email already exists in the database
$stmt = $conn->prepare("SELECT * FROM register WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script>alert('The email you entered has already been registered.'); window.location.href='../login.php';</script>";
    exit();
}

$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Insert the user into the database
$stmt = $conn->prepare("INSERT INTO register (name, phone, email, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $phone, $email, $password);

if ($stmt->execute()) {
    echo "<script>alert('Registration successful!!');</script>";
    echo "</br><p>Go to <a href='../login.php'>Login</a> page</p>";
} else {
    echo "Error: " . $stmt->error;
}

// Get the user's session ID
$stmt = $conn->prepare("SELECT * FROM register WHERE phone = ?");
$stmt->bind_param("s", $phone);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $_SESSION['SN'] = $row['SN'];
}

// Send a confirmation email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'snabin793@gmail.com';
    $mail->Password   = 'wobz qoxr msju gjcb';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('snabin793@gmail.com', 'Nabin Paudel');
    $mail->addAddress($email, $name);
    $mail->isHTML(true);
    $mail->Subject = 'ArenaPlay Registration';
    $mail->Body    = '<b>You have been successfully registered on ArenaPlay. Thank you for registering!</b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

$conn->close();
$mail->smtpClose();
?>
