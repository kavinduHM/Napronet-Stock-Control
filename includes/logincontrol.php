<?php

require_once "config.php";

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    // Retrieve user input from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input (you can add more validation as needed)
    if (empty($username) || empty($password)) {
        // Handle empty fields error
        $error = "Please enter both username and password.";
    } else {
        // Use prepared statement to prevent SQL injection
        $sql = "SELECT * FROM admin WHERE name =? AND password=?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            // If a matching record is found, grant access
            if (mysqli_num_rows($result) == 1) {
                // Start a session and store user data
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;

                // Redirect to a dashboard or another page
                header("Location: /dashboard.php");
                exit();
            } else {
                // If no matching record is found, deny access
                $error = "Invalid username or password.";
            }
        } else {
            // Handle database query error
            $error = "Error: " . mysqli_error($db);
        }
    }
}

// Close prepared statement
if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}

// Close database connection
mysqli_close($db);

// Redirect back to index.php with error message if applicable
if (!empty($error)) {
    header("Location: /index.php?error=" . urlencode($error));
    exit();
}
?>
