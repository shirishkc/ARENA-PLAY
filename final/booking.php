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
    <link rel="icon" href="Artboard 2.png"> 
    <title>Arena Play | Booking</title>
    <link href="booking.css" rel="stylesheet">
</head>
<body class="light">
        <header>
            <img class="logo" src="Artboard 2_2.png" alt="#">
            <nav class="navigation">
                <a href="index.php">Home</a>
                <a href="index.php#about">About</a>
                <a href="booking.php">Booking</a>
                <a href="index.php#contact">Contact</a>
                <a href="login.php">
                    <svg class="person" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                  </a>
            </nav>
        </header>
<div class="wrapper">
<div class="form-box cal">
    <h2>Select date</h2>
        <div class="calendar">
            <div class="calendar-header">
                <span class="month-picker" id="month-picker">February</span>
                <div class="year-picker">
                    <span class="year-change" id="prev-year">
                        <pre><</pre>
                    </span>
                    <span id="year">2021</span>
                    <span class="year-change" id="next-year">
                        <pre>></pre>
                    </span>
                </div>
            </div>
            <div class="calendar-body">
                <div class="calendar-week-day">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="calendar-days"></div>
            </div>
            <div class="month-list"></div>
        </div>
        <button id="btn" class="date-link">Select</button>
    </div>
<div class="form-box date">
<div class="log">
    <a class="calender-link" href="#">Login</a>
       </div>
       <div class="calendar-week-day">
        <div>Sun</div>
        <div>Mon</div>
        <div>Tue</div>
        <div>Wed</div>
        <div>Thu</div>
        <div>Fri</div>
        <div>Sat</div>
    </div>
    </div>
</div>
    <script src="booking.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>