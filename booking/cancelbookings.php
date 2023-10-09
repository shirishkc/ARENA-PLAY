<!-- delete the bookings   -->
<?php
include("../include/dbcon.php");
// if (!isset($_SESSION['user_id'])) {
//   header('Location: ../login.php');
//   exit();
// }
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $SN = $_GET['SN'];
  $date = $_GET['date'];
  $time = $_GET['time'];
  $sql = "DELETE FROM bookings WHERE SN = '$SN' AND date = '$date' AND time = '$time'";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Booking deleted successfully');
    window.location.href='booking.php';
    </script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
?>






