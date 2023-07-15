<?php
include("../include/dbcon.php");
$phone = $_POST['phone'];
$password = $_POST['password'];

// Validate phone number and password
$sql = "SELECT * FROM register WHERE phone = '$phone' AND password = '$password'";
$result = $conn->query($sql);

if ($result === false) {
    // Query execution error
    die("Query error: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Login successful
    echo "Login successful.";
} else {
    // Login failed
    echo "Invalid phone number or password.";
}

// Close the database connection
$conn->close();
?>