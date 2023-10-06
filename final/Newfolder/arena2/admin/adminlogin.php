<?php
include("../include/dbcon.php");
if(isset($_SESSION['username'])){
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
    background-image: url('wallpaper.jpg');
</style>
</head>

<body>
    <form action="adminloginprocess.php" method="POST">
        <label>Username : </label><input type="text" name="username" placeholder="username"><br><br>
        <label>Password : </label><input type="password" name="password" placeholder="passowrd"><br><br>
        <button type="submit" name="login">Log in</button> 
    </form>
</body>

</html>