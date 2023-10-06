<!-- view all the users who have booked  -->
<?php
include('../include/dbcon.php');
if (!isset($_SESSION['username'])) {
    header("Location: adminlogin.php");
}
if (isset($_POST['viewbookings'])) {
    $sql = "SELECT b.date, b.time, r.name,r.SN
    FROM register r
    JOIN bookings b ON b.SN = r.SN order by b.date asc ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo ("<table border='1'>
        <tr>
            <th>Booking ID</th>
            <th>Username</th>
            <th>Booking Date</th>
            <th>Booking Time</th>
            
        </tr>");
        while ($row = $result->fetch_assoc()) {
            echo ("<tr>
            <td>" . $row['SN'] . "</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['date'] . "</td>
            <td>" . $row['time'] . "</td>
           
        </tr>");
        }
        echo ("</table>");
    } else {
        echo ("<script>
        alert('No bookings yet!!!');
        window.location.href='dashboard.php';
        </script>");
    }
}
// select distinct users who have booked the futsal and show how many times have they booked the futsal
if (isset($_POST['viewusers'])) {
    $sql = "SELECT r.name,r.SN,count(b.SN) as count
    FROM register r
    JOIN bookings b ON b.SN = r.SN group by r.SN order by count desc ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo ("<table border='1'>
        <tr>
            <th>Username</th>
            <th>Booking Count</th>
            
        </tr>");
        while ($row = $result->fetch_assoc()) {
            echo ("<tr>
            <td>" . $row['name'] . "</td>
            <td>" . $row['count'] . "</td>
           
        </tr>");
        }
        echo ("</table>");
    } else {
        echo ("<script>
        alert('No bookings yet!!!');
        window.location.href='dashboard.php';
        </script>");
    }
}


