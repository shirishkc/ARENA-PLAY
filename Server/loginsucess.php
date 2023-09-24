<?php
include("include/dbcon.php");

// if (isset($_SESSION['SN'])) {
//     header("Location: ../booking.php");
//     exit();
// }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST["phone"];
    $password = $_POST["password"];


    // Retrieve the hashed password from the database for the given username
    $sql = "SELECT password FROM register WHERE phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row was found for the given username
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedHashedPassword = $row["password"];
        // $enteredPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);   
        // Verify the entered password against the stored hashed password
        if (password_verify($password,$storedHashedPassword)) {
            // Password is correct, allow access to the user
            $sql = "SELECT * FROM register WHERE phone = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $phone);
            $stmt->execute();
            // echo "Login success";
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $sn = $row['SN'];
            $_SESSION['SN'] = $sn;
            header('Location: ../booking.php');
        } else {
            // Password is incorrect, display an error message or deny access
            echo "Invalid username or password.";

            // Debugging
            echo "Password verification failed.";
        }

        // Debugging
        // echo "Stored Hashed Password: " . $storedHashedPassword . "<br>";
        // echo "Entered Password: " . $password . "<br>";

        // Continue with password validation (step 2)
    } else {
        // Username not found, display an error or deny access
        echo "Invalid username or password.";
    }

    // ...



    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "error";
    header("Location: ../login.php");
    exit();
}
?>
// if($_SERVER["REQUEST_METHOD"]=="POST"){
// $phone = $_POST['phone'];
// $password = $_POST['password'];

// // Validate phone number and password
// $sql = "SELECT * FROM register WHERE phone = '$phone' AND password = '$password'";
// $result = $conn->query($sql);

// if ($result === false) {
//     die("Query error: " . mysqli_error($conn));
// }

// if ($result->num_rows > 0) {
//     // Login successful
//    //set session
//     $sql = "SELECT * FROM register WHERE phone = '$phone'";
//     $result = $conn->query($sql);
//     $row = $result->fetch_assoc();
//     $sn = $row['SN'];
//     $_SESSION['SN'] = $sn;
//     header('Location: ../booking.php');
//     // echo "Login successful.";
//     // echo"</br><a href='../booking.html'>Go to bookings</a> ";
//     exit();
// } else {
//     // Login failed
//     $error_message = "Invalid phone no. or password.";
//     // echo "Invalid phone number or password.";
    
// }

// if (isset($error_message)) {
//     echo "<p class='error'>$error_message</p>";
//     echo"<a href='../login.php'>Login again</a> ";
// }

// // Close the database connection
// $conn->close();
// }
