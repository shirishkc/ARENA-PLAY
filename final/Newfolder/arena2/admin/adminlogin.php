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
    
    <link rel="icon" href="Artboard 2.png">
    <title>Login</title>
    <link href="adminlogin.css" rel="stylesheet">
</head>


<body style="background-image: url('wallpaperflare.com_wallpaper.jpg');">    
    <div class="wrapper">
        <div class="form-box login">
            <h2>Admin Login</h2>
            <form action="adminloginprocess.php" method="post">
                <?php
                // Display login error message if there is one
                if (!empty($error_message)) {
                    echo '<div style="color: red;">' . $error_message . '</div>';
                }
                ?>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div>
                    <!-- <a class="forgot" href="forgotpassword.php">forgot password?</a> -->
                </div>
                <button type="submit" class="btn">Login</button>
                
            </form>
        </div>
    </div>
    <script src="login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
