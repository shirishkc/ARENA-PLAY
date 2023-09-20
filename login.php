<!-- session  -->
<?php
session_start();
include("include/dbcon.php");
if (isset($_SESSION['SN'])) {
    header("Location: ../booking.php");
    exit();
}
// else{
//     header("Location: ../login.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
        <header>
            <h2 class="logo">Logo</h2>
            <nav class="navigation">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="booking.php">Booking</a>
                <a href="#">Contact</a>
                <a href="#">
                    <svg class="person" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                  </a>
            </nav>
        </header>
<div class="wrapper">
<div class="form-box login">
    <h2>Login</h2>
    <form action="Server/loginsucess.php" method="POST">
        <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="text" name= "phone" required>
            <label>Phone no.</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" name="password" required>
            <label>Password</label>
        </div>
        <div>
        <a class="forgot" href="#">forgot password?</a>
    </div>
        <button type="submit" class="btn">Login</button>
        <div class="reg">
            Don't have an account? <a class="register-link" href="#">Register</a>
        </div>
    </form>
</div>
<div class="form-box register">
    <h2>Register</h2>
    <form action="Server/registersucess.php" method="POST">
        <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" name="name">
            <label>Name</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="call"></ion-icon></span>
            <input type="integer" name="phone" required>
            <label>Phone number</label> 
             <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" name="email">
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="password" required>
                <label>Password</label>
        </div> 
        <button type="submit" class="btn" name="register">Register</button>
        <div class="log">
            Already have an account? <a class="login-link" href="#">Login</a>
        </div>
    </form>
</div>
</div>
    <script src="login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>