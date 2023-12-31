<?php
include("include/dbcon.php");
if (isset($_SESSION['SN'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="Artboard 2.png">
    <title>Login</title>
    <link href="login.css" rel="stylesheet">
</head>


<body>
    <?php
    // session_start();
    // include("../include/dbcon.php");

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
            if (password_verify($password, $storedHashedPassword)) {
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
                header('Location: index.php');
            } else {
                // Password is incorrect, display an error message or deny access
                $error_message = "Invalid username or password";
            }

            // Debugging
            // echo "Stored Hashed Password: " . $storedHashedPassword . "<br>";
            // echo "Entered Password: " . $password . "<br>";

            // Continue with password validation (step 2)
        } else {
            // Username not found, display an error or deny access
            $error_message = "Invalid username or password";
        }

        // ...



        // Close the database connection
        $stmt->close();
        $conn->close();
    }
    ?>
    <header>
        <img class="logo" src="Artboard 2_2.png" alt="#">
        <nav class="navigation">
            <a href="index.php">Home</a>
            <a class="title about" href="#about">About</a>
            <a href="booking.php">Booking</a>
            <a class="title contact" href="#contact">Contact</a>
            <a href="login.php">
                <svg class="person" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg> </a>
            <a href="logout.php">
                <ion-icon class="logout" name="log-out-outline"></ion-icon>
            </a>
        </nav>
    </header>
    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <?php
                // Display login error message if there is one
                if (!empty($error_message)) {
                    echo '<div style="color: red;">' . $error_message . '</div>';
                }
                ?>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" name="phone" required>
                    <label>Phone number</label>
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
                <div class="reg">
                    Don't have an account? <a class="register-link" href="#">Register</a>
                </div>
            </form>
        </div>
        <div class="form-box register">
            <h2>Register</h2>
            <form action="success/registersuccess.php" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="name" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="call"></ion-icon></span>
                    <input type="text" name="phone" required>
                    <label>Phone number</label>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="password1" required>
                        <label>Password</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="password2" required>
                        <label>Confirm Password</label>
                    </div>
                    <button type="submit" class="btn">Register</button>
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