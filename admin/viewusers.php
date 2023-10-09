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
// View users and their booking coun
if (isset($_POST['viewusers'])) {
    $sql = "SELECT r.name, r.phone, COUNT(b.SN) AS count
    FROM register r
    LEFT JOIN bookings b ON b.SN = r.SN
    GROUP BY r.SN
    ORDER BY count DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo ("<table border='1'>
        <tr>
            <th>Username</th>
            <th>Phone Number</th>
            <th>Booking Count</th>
        </tr>");
        while ($row = $result->fetch_assoc()) {
            echo ("<tr>
            <td>" . $row['name'] . "</td>
            <td>" . $row['phone'] . "</td>
            <td>" . $row['count'] . "</td>
        </tr>");
        }
        echo ("</table>");
    } else {
        echo ("<script>
        alert('No users yet!!!');
        window.location.href='dashboard.php';
        </script>");
    }
}

$conn->close();

?>
<html>
<head>
<style>
body {
        background: url(wallpaperflare.com_wallpaper.jpg) no-repeat;
    }</style>
</head>
<body>
    
</body>
</html>
