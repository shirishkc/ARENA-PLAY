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
        <a href="index.php">Home</a>
        <a href="index.php#about">About</a>
        <a href="booking.php">Booking</a>
        <a href="index.php#contact">Contact</a>
        <a href="login.php">
          <svg
            class="person"
            xmlns="http://www.w3.org/2000/svg"
            width="30"
            height="30"
            fill="currentColor"
            class="bi bi-person-circle"
            viewBox="0 0 16 16"
          >
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path
              fill-rule="evenodd"
              d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
            />
          </svg>
        </a>
      </nav>
    </header>
    <form action="">
        <input name="date" type="text">
      <div mbsc-page class="demo-appointment-booking">
        <div style="height: 100%">
          <div class="md-calendar-booking">
            <div class="mbsc-form-group">
              <div class="mbsc-form-group-title">
                <a class="select" href="#">Select date & time</a>
              </div>
              <div id="demo-booking-datetime" class="booking-datetime"></div>
              <button class="btn submit">Book</button>
            </div>
          </div>
        </div>
      </div>
    </input>
    </form>
    <script src="booking.js"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
