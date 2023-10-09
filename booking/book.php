<?php
include("../include/dbcon.php"); 
// session_start();
if (!isset($_SESSION['SN'])) {
  header('Location: ../login.php');
  exit();
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $date = $_POST['date'];
  $time = $_POST['time'];
  //connect foreign key
  $SN = $_SESSION['SN'];
  $sql = "SELECT * FROM users WHERE SN = '$SN'";
  $result = $conn->query($sql);
  // $row = $result->fetch_assoc();
  // $SN = $row['SN'];


  // Check if the date and time are already booked
  $sql = "SELECT * FROM bookings WHERE date = '$date' AND time = '$time'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Sorry , the choosen date and time is unavailable.');  window.location.href='booking.php';</script>";
    
  } else {
    $sql = "INSERT INTO bookings (date, time ,SN) VALUES ('$date', '$time','$SN')";
    if (mysqli_query($conn, $sql)) {
      echo "<script>alert('Booking successful! Please reach the arena on time.');  window.location.href='booking.php';</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

  mysqli_close($conn);
}
?>
