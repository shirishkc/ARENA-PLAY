<?php
session_start();
include("../include/dbcon.php"); 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $date = $_POST['date'];
  $time = $_POST['time'];

  // Check if the date and time are already booked
  $sql = "SELECT * FROM bookings WHERE date = '$date' AND time = '$time'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "Unavailable";
  } else {
    $sql = "INSERT INTO bookings (date, time) VALUES ('$date', '$time')";
    if (mysqli_query($conn, $sql)) {
      echo "Booking successful!";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

  mysqli_close($conn);
}
?>
