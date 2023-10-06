<!-- change password of admin dashboard -->
<?php
session_start();
include("../include/dbcon.php");
if (!isset($_SESSION['username'])) {
    header("Location: adminlogin.php");
}
if (isset($_POST['changepassword'])) {
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if ($password1 == $password2) {
        $sql = "UPDATE admin SET password = '$password1' WHERE username = 'admin'";
        $result = $conn->query($sql);
        if ($result) {
            echo ("<script>
            alert('Password changed successfully!!!');
            window.location.href='dashboard.php';
            </script>");
        } else {
            echo ("<script>
            alert('Password change failed!!!');
            window.location.href='dashboard.php';
            </script>");
        }
    } else {
        echo ("<script>
        alert('Password mismatch!!!');
        window.location.href='dashboard.php';
        </script>");
    }
}
?>