<?php
// Include the database configuration file
require_once "config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve selected name from the form
    $selectedName = $_POST['Name'];

    // Prepare and execute SQL query to delete the user row
    $sql = "DELETE FROM employers WHERE Name = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $selectedName); // Bind the parameter
    $stmt->execute(); // Execute the query

    // Check if the query was successful
    if ($stmt->affected_rows > 0) {
        // Redirect back to the page with success message
        header("Location: /EmployerEdit.php?message=success");
        exit();
    } else {
        // Redirect back to the page with error message
        header("Location: /EmployerEdit.php?message=error");
        exit();
    }
}
?>
