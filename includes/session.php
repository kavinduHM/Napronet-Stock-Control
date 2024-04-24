<?php
// Start session
session_start();

// Check if the user is not logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        // Redirect to the login page
    header("Location: /index.php");
    exit();
}
?>
