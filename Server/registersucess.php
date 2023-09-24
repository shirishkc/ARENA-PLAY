<?php
include("include/dbcon.php");
//session
// session_start();
if (isset($_SESSION['SN'])) {
    header("Location: ../booking.php");
    exit();
}

$name = $_POST['name'];
$phone = $_POST['phone'];
//show error if phone already exists in database
$sql = "SELECT * FROM register WHERE phone = '$phone'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Login successful
    echo "<script>alert('The phone number you entered has already been registered.');
    window.location.href='../login.php';
    </script>";
    // echo"</br><p>Go to <a href='../login.php'>Login</a> page</p>";
    exit();
}
$email = $_POST['email'];
//error if email if already present
$sql = "SELECT * FROM register WHERE email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Login successful
    echo "<script>alert('The email you entered has already been registered.');
    window.location.href='../login.php';
    </script>";
    // echo"</br><p>Go to <a href='../login.php'>Login</a> page</p>";
    exit();
}

$password = password_hash($_POST['password'],PASSWORD_BCRYPT);

//SQL 
$sql = "INSERT INTO register (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registration sucessful!!Click OK to go to login page.');
    window.location.href='../login.php';
    </script>";
    // echo"</br><p>Go to <a href='../login.php'>Login</a> page</p>";
} else {
    echo "Error: " . $sql . "<br>". mysqli_error($conn);
}

$conn->close();
?>
