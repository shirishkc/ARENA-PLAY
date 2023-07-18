<?php
session_start();

include("include/dbcon.php");
if (isset($_SESSION['SN'])) {
    header("Location: ../booking.php");
    exit();
}
// else{
//     header("Location: ../login.php");
//     exit();
// }


$name = $_POST['name'];
$phone = $_POST['phone'];
//show error if database already contains the same phone number before any data is registered
$sql = "SELECT * FROM register WHERE phone = '$phone'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Login successful
    echo "<script>alert('Phone number already exists.');</script>";
    header("Location: ../login.php");
    exit();
}
$email = $_POST['email'];
$password = $_POST['password'];

//SQL 
$sql2 = "INSERT INTO register (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";

if ($conn->query($sql2) === TRUE) {
    
    
    header('Location: ../login.php');

    echo"
    <script>
    alert('Registration successful.');
    </script>";

} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}

$conn->close();
?>
