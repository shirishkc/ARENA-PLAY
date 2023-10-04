<!-- Display the bookings of the user after the current time-->
<?php
include('../include/dbcon.php');
if (!isset($_SESSION['SN'])) {
    header('Location: login.php');
    exit();
}
$SN = $_SESSION['SN'];
$sql = "SELECT * FROM bookings WHERE SN = '$SN' AND date >= CURDATE() order by date asc ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table><tr><th>Date</th><th>Time</th><th>Cancel</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["date"] . "</td><td>" . $row["time"] . "</td><td><a href='cancelbookings.php?SN=" . $row["SN"] . "&date=" . $row["date"] . "&time=" . $row["time"] . "'>Cancel</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "No bookings found.";
}
$conn->close();
?>
<!-- AND time > CURTIME() -->