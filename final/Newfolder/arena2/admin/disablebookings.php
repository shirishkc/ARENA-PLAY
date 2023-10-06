<?php
include("../include/dbcon.php");

// Check if the admin is logged in
if (!isset($_SESSION['username'])) {
    header("Location: adminlogin.php");
    exit();
}

if (isset($_POST['bookings'])) {
    $message = $_POST['message'];
    $state = $_POST['bookings'];
    $sql = "UPDATE admin SET State = '$state', message='$message' WHERE username = 'admin'";
    $result = $conn->query($sql);
?>
    <script>
        var state = "<?php echo $state; ?>";
        if (state == "disabled") {
            alert("Bookings disabled successfully!!!");
        } else {
            alert("Bookings enabled successfully!!!");
        }
        window.location.href = 'dashboard.php';
    </script>
<?php

} else {
    // No checkbox was checked
    echo ("<script>
    alert('Please select an option to enable or disable bookings.');
    window.location.href='dashboard.php';
    </script>");
}

// Close the database connection after the operations
$conn->close();
?>