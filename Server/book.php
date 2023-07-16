<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: ../login.php');
  exit();
}
include("../include/dbcon.php"); 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $date = $_POST['date'];
  $time = $_POST['time'];

  // Check if the date and time are already booked
  $sql = "SELECT * FROM bookings WHERE date = '$date' AND time = '$time'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "Sorry , the choosen date and time is unavailable.";
  } else {
    $sql = "INSERT INTO bookings (date, time) VALUES ('$date', '$time')";
    if (mysqli_query($conn, $sql)) {
      echo "Booking successful! Please reach the arena on time.";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

  mysqli_close($conn);
}
?>
