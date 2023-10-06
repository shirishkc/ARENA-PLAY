<!-- logout page for admin -->
<?php
session_start();
include("../include/dbcon.php");
if (!isset($_SESSION['username'])) {
    header("Location: adminlogin.php");
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: adminlogin.php");
}
?>