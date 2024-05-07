<?php
// Include the database configuration file
require_once "config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['Name'];
    $address = $_POST['Address'];
    $contact = $_POST['ContactNumber'];
    $department = $_POST['Department'];
    $position = $_POST['Position'];
    $dayPayRate = $_POST['DayPayRate'];

    // Prepare and execute SQL query to update the employers table
    $sql = "INSERT INTO employers (Name, Address, ContactNumber, Department, Position, DayPayRate) 
            VALUES ('$name', '$address', '$contact', '$department', '$position', '$dayPayRate')";
    
    if ($db->query($sql) === TRUE) {
        // Redirect back to EmployerEdit.php with success message
        header("Location: /EmployerEdit.php?message=success");
        exit();
    } else {
        // Redirect back to EmployerEdit.php with error message
        header("Location: /EmployerEdit.php?message=error");
        exit();
    }
}
?>
