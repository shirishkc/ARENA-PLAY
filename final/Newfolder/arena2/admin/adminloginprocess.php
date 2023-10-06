<?php
session_start();
include("../include/dbcon.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Modify the SQL query to use placeholders
    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Successful login
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid credentials
        echo ("<script>
        alert('Invalid username or password!!!');
        window.location.href='adminlogin.php';
        </script>");
    }
} else {
    // Invalid request
    echo ("<script>
    alert('Invalid request!!!');
    window.location.href='adminlogin.php';
    </script>");
}
?>
