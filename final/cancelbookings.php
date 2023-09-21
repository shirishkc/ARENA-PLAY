<!-- cancel multiple bookings done by the user 
<?php
session_start();
include("include/dbcon.php");
if (!isset($_SESSION['SN'])) {
    header("Location: login.php");
    exit();
}
?>

