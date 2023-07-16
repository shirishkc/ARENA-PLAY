<?php
include("include/dbcon.php");


$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

//SQL 
$sql = "INSERT INTO register (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";

if ($conn->query($sql) === TRUE) {

    echo "Registration successful.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>
