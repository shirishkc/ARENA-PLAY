<?php

include("../include/dbcon.php");
if (!isset($_SESSION['SN'])) {
  header("Location: ../login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/mobiscroll.javascript.min.css" />
  <script src="js/mobiscroll.javascript.min.js"></script>

  <link rel="icon" href="../Artboard 2.png" />
  <title>Arena Play | Booking</title>
  <link href="booking.css" rel="stylesheet" />

</head>

<body class="light">
  <header>
    
    <a href="../index.php"><img class="logo" src="Artboard 2_2.png" alt="#" /></a>
    <nav class="navigation">
      <a href="../index.php">Home</a>
      <!-- insert log-out-outline.svg in nav bar -->
      <a href="../logout.php">
        <ion-icon class="icon log" title="Logout" name="log-out-outline"></ion-icon>
      </a>

    </nav>
  </header>
  <?php
  $sql = "SELECT * FROM admin WHERE username = 'admin'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if ($row['State'] == 'disabled') {
    // blur other sections and show a popup
    echo "<div class='popup' style ='margin-top:-150px'>
    <div class='popup-content'>
      <div class='popup-close'></div>
      <h1>The bookings are currently disabled by the admin.</h1>
      "
  ?>
    <h2>Message from Admin : <?php
                              echo $row['message'];
                              ?></h2>
  <?php
    echo "<h3>For more information, <a href='../index.php#contact'>contact</a> the admin.</h3>
    </div>
  </div>";
  } else {

  ?>
    <div class="wrapper">
      <div class="form-box login">
        <h1>Book here</h1>
        <form action="book.php" method="POST">
          <div class="calender">
            <div>
              <!-- <label>Date:</label> -->
              <input class="date" id="eventDate" name="date" type="date" required>
              <script>
                // Get the input element
                const eventDateInput = document.getElementById("eventDate");

                // Get today's date in YYYY-MM-DD format
                const today = new Date().toISOString().split('T')[0];

                // Set the minimum date
                eventDateInput.min = today;
              </script>
            </div>
            <div>
              <!-- <input class="time" name="time" type="time" required> -->
              <!-- <label>Time:</label> -->
              <select name="time" class="time" id="time" required>
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
            </div>
            <div><button class="btn submit">Submit</button></div>
          </div>
          <div class="reg">
            <a class="register-link" href="#">My bookings</a>
          </div>
        </form>
      </div>
      <div class="form-box register">
        <h1>My Bookings</h1>
        <form action="sucess/registersucess.php" method="POST">
          <div class="log">

            <!-- display bookings -->
            <?php
            include('../include/dbcon.php');
            if (!isset($_SESSION['SN'])) {
              header('Location: login.php');
              exit();
            }
            $SN = $_SESSION['SN'];
            $sql = "SELECT * FROM bookings WHERE SN = '$SN' AND date >= CURDATE() order by date asc ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              echo "<table><tr><th>Date</th><th>Time</th><th></th></tr>";
              while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["date"] . "</td><td>" . $row["time"] . "</td><td><a href='cancelbookings.php?SN=" . $row["SN"] . "&date=" . $row["date"] . "&time=" . $row["time"] . "'>Cancel</a></td></tr>";
              }
              echo "</table>";
            } else {
              echo "No bookings found.";
            }
            $conn->close();
            ?>
            <a class="login-link" href="#">Go Back</a>
          </div>
        </form>
      </div>
    </div>
  <?php
  }
  ?>
  <script src="booking.js"></script>
</body>

</html>