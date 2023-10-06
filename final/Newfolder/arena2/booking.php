<?php
  session_start();
  include("include/dbcon.php");
  if (!isset($_SESSION['SN'])) {
    header("Location: login.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="css/mobiscroll.javascript.min.css" />
    <script src="js/mobiscroll.javascript.min.js"></script>

    <link rel="icon" href="Artboard 2.png" />
    <title>Arena Play | Booking</title>
    <link href="booking.css" rel="stylesheet" />
  </head>
  <body class="light">
    <header>
      <img class="logo" src="Artboard 2_2.png" alt="#" />
      <nav class="navigation">
        <a href="index.html">Home</a>
        <a href="#">
          <ion-icon class="icon log" name="log-out-outline"></ion-icon>
      </a>
      </nav>
    </header> 
<div class="wrapper">
  <div class="form-box login">
    <h1>Futsal Booking</h1>
    <form action="#">
     <div class="calender">
     <div><input class="date" name="date" type="date"></div> 
     <div><input class="time" name="time" type="time"></div>
     <div><button class="btn submit">Submit</button></div>
     </div>
     <div class="reg">
      <a class="register-link" href="#">My bookings</a>
  </div>
    </form>
</div>
  <div class="form-box register">
      <form action="sucess/registersucess.php" method="POST">
        <h1>My Bookings</h1>
          <div class="log">
           <a class="login-link" href="#">Show less</a>
          </div>
      </form>
  </div>
  </div>
    <script src="booking.js"></script>
  </body>
</html>

