
<?php
include("../include/dbcon.php");

// Check if the admin is logged in
if (!isset($_SESSION['username'])) {
    header("Location: adminlogin.php");
    exit();
}

if (isset($_POST['disablebookings'])) {
    $sql = "UPDATE admin SET State = 'disabled' WHERE username = 'admin'";
    $result = $conn->query($sql);

    if ($result) {
        // Successful update
        echo ("<script>
        alert('Booking disabled successfully!!!');
        window.location.href='dashboard.php';
        </script>");
    } else {
        // Update failed
        echo ("<script>
        alert('Booking disable failed!!!');
        window.location.href='dashboard.php';
        </script>");
    }
} elseif (isset($_POST['enablebookings'])) {
    // Handle the case when the "Enable Bookings" checkbox is checked
    $sql = "UPDATE admin SET State = 'enabled' WHERE username = 'admin'";
    $result = $conn->query($sql);

    if ($result) {
        // Successful update
        echo ("<script>
        alert('Booking enabled successfully!!!');
        window.location.href='dashboard.php';
        </script>");
    } else {
        // Update failed
        echo ("<script>
        alert('Booking enable failed!!!');
        window.location.href='dashboard.php';
        </script>");
    }
} else {
    // No checkbox was checked
    echo ("<script>
    alert('Please select an option to enable or disable bookings.');
    window.location.href='dashboard.php';
    </script>");
}
// keep the check box checked until changed
// if (isset($_POST['disablebookings'])) {
//     echo ("<script>
//     document.getElementById('disablebookings').checked = true;
//     </script>");
// } elseif (isset($_POST['enablebookings'])) {
//     echo ("<script>
//     document.getElementById('enablebookings').checked = true;
//     </script>");
// }

// Close the database connection after the operations
$conn->close();
?>
