<?php
  session_start();
  include("include/dbcon.php");
  if (!isset($_SESSION['SN'])) {
    header("Location: login.php");
    exit();
  }
?>
<html>
  <head>
    <title>Booking</title>
    <link rel="stylesheet" type="text/css" href="css/bookingstyle.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
  </head>
  <body>
    <div class="container">
      <h1>Booking Form</h1>
      <form action="Server/book.php" method="POST">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
        <label for="time">Time:</label>
        <select name="time" id="time" required>
          <option value="9:00">9:00-10:00</option>
          <option value="10:00">10:00-11:00</option>
          <option value="11:00">11:00-12:00</option>
          <option value="12:00">12:00-13:00</option>
          <option value="13:00">13:00-14:00</option>
          <option value="14:00">14:00-15:00</option>
          <option value="15:00">15:00-16:00</option>
          <option value="16:00">16:00-17:00</option>
          <option value="17:00">17:00-18:00</option>
          <option value="18:00">18:00-19:00</option>
          </select>
        <!-- <input type="time" id="time" name="time" required> -->

        <input type="submit" value="Book Now">
      </form>
      <form>
        <input type="button" value="Logout" onclick="window.location.href='logout.php'" />

      </form>
    </div>
  </body>

