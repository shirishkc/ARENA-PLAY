<?php
session_start();
include("../include/dbcon.php");

if (isset($_SESSION['SN'])) {
    header("Location: ../booking.php");
    exit();
}

$phone = $_POST['phone'];
$password = $_POST['password'];

// Validate phone number and password
$sql = "SELECT * FROM register WHERE phone = '$phone' AND password = '$password'";
$result = $conn->query($sql);

if ($result === false) {
    // Query execution error
    die("Query error: " . mysqli_error($conn));
}

if ($result->num_rows > 0) {
    // Login successful
   
    $row = $result->fetch_assoc();
    $sn = $row['SN'];
    $_SESSION['SN'] = $sn;
    // $_SESSION['user_id'] = $phone;
    header('Location: ../booking.php');
    // echo "Login successful.";
    // echo"</br><a href='../booking.html'>Go to bookings</a> ";
    exit();
} else {
    // Login failed
    $error_message = "Invalid phone no. or password.";
    // echo "Invalid phone number or password.";
    
}

if (isset($error_message)) {
    echo "<p class='error'>$error_message</p>";
    echo"<a href='../login.php'>Login again</a> ";
}

// Close the database connection
$conn->close();
?>