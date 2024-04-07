<?php
session_start();
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Check credentials against database (replace with your database connection and query)
    if ($username === 'kavindu@gmail.com' && $password === '2426') {
        // Authentication successful, set session variables
        $_SESSION['username'] = $username;
        // Redirect to dashboard or desired page
        header("Location: /dashboard.php");
        exit;
    } else {
        // Authentication failed, redirect back to login page with error message
        header("Location: login.php?error=1");
        exit;
    }
}
?>
