<!-- admin dashboard -->
<?php
include('../include/dbcon.php');
if (!isset($_SESSION['username'])) {
    header("Location: adminlogin.php");
}

?>


<html>

<head>
    <title>Admin</title>

</head>

<body>
    <div>
        <h1>Admin Dashboard</h1>
    </div>
    <div style="margin: -20px 0px -30px 0px">
        <!-- logout -->
        <form action="adminlogout.php" method="POST">
            <button type="submit" name="logout">Log out</button>
        </form>
    </div><br>
    <h2>Welcome <?php echo $_SESSION['username']; ?></h2>
    <!-- change the admin login password -->
    <div style="border: 2px dashed black; padding: 5px; width: 400px">
        <h3>Change password for admin</h3>
        <form action="adminchangepassword.php" method="POST">
            <label>Enter new password for admin : </label>
            <input type="password" name="password1" placeholder="Enter new password" required><br><br>
            <label>Re-enter the password : </label>
            <input type="password" name="password2" placeholder="Re-enter new password" required><br><br>
            <button type="submit" name="changepassword">Change Password</button>
        </form>
    </div>
    <!-- view all bookings -->
    <div style="border: 2px dashed black; padding: 5px; width: 400px">
        <h3>View all the bookings</h3>
        <form action="viewusers.php" method="POST">
            <button type="submit" name="viewbookings">View bookings</button>
        </form>
    </div>
    <!-- view all users -->
    <div style="border: 2px dashed black; padding: 5px; width: 400px">
        <h3>View all the users and frequency of their bookings</h3>
        <form action="viewusers.php" method="POST">
            <button type="submit" name="viewusers">View Users</button>
        </form>
    </div>
    <!-- disable bookings -->
    <div style="border: 2px dashed black; padding: 5px; width: 400px">
        <h3>Disable/Enable the bookings</h3>
        <form action="disablebookings.php" method="POST">
            <input type="checkbox" name="disablebookings" value="disablebooking">Disable Bookings<br><br>
            <input type="checkbox" name="enablebookings" value="enablebooking">Enable Bookings<br><br>
            <button type="submit" name="Submit">Submit</button>
        </form>

    </div>

</body>

</html>