<?php
include("include/dbcon.php");

if(isset($_POST['submit'])) {

  // Get selected booking IDs
  $selected = $_POST['booking_id'];
  
  // Loop through selected IDs and cancel
  foreach($selected as $id) {
    
    $query = "UPDATE bookings SET status='Cancelled' WHERE id=$id";
    
    mysqli_query($conn, $query);
    
  }

  if(mysqli_affected_rows($conn)>0){
    echo "Bookings cancelled!";
  }

}

?>
<html><head></html><body>
<form method="post">

<table>
<tr><th><input type="checkbox" id="selectAll"></th><th>Booking ID</th><th>User</th></tr>

<?php 

// Query and display bookings
$result = mysqli_query($conn, "SELECT * FROM bookings");

while($row = mysqli_fetch_array($result)) {

  echo "<tr>";
  echo "<td><input type='checkbox' name='booking_id[]' value='{$row["id"]}'></td>"; 
  echo "<td>{$row["id"]}</td>";
  echo "<td>{$row["user_id"]}</td>";
  echo "</tr>";

}

?>

</table>

<button type="submit" name="submit">Cancel Selected</button>

</form>
</body>
</html>