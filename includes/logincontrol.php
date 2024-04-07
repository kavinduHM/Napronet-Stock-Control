<?php
session_start();
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Database connection parameters
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "napronet";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to retrieve user information
    $sql = "SELECT * FROM users WHERE Username = ?";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("s", $username);

    // Execute statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        // User exists, fetch user data
        $row = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $row['Password'])) {
            // Authentication successful, set session variables
            $_SESSION['username'] = $username;
            // Redirect to dashboard or desired page
            header("Location:dashboard.php");
            exit;
        }
    }

    // Authentication failed, redirect back to login page with error message
    header("Location: login.php?error=1");
    exit;

    // Close connection
    $stmt->close();
    $conn->close();
}
?>
