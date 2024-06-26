<?php
// Include the database configuration file
require_once "config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productType = $_POST['productType'];
    $productId = $_POST['productId'];
    $updateAmount = $_POST['updateAmount'];
    $addRemove = $_POST['addRemove']; // Value will be 'add' or 'remove'

    // Determine the table name based on product type
    $tableName = '';
    if ($productType == 'Coir Pot') {
        $tableName = 'coirpots_readytoship';
    } elseif ($productType == 'Disc') {
        $tableName = 'discs_readytoship';
    }

    // Update stock in the appropriate table
    if (!empty($tableName)) {
        // Construct SQL query based on add or remove operation
        if ($addRemove == 'add') {
            $sql = "UPDATE $tableName SET CurrentStock = CurrentStock + $updateAmount WHERE ProductCode = '$productId'";
        } elseif ($addRemove == 'remove') {
            $sql = "UPDATE $tableName SET CurrentStock = CurrentStock - $updateAmount WHERE ProductCode = '$productId'";
        }

        // Execute SQL query
        if ($db->query($sql) === TRUE) {
            // Redirect to stockupdate.php with success message
            header("Location: /stockupdate.php?message=success");
            exit(); // Ensure no further code is executed after redirection
        } else {
            // Redirect to stockupdate.php with error message
            header("Location: /stockupdate.php?message=error");
            exit(); // Ensure no further code is executed after redirection
        }
        } else {
            // Redirect to stockupdate.php with error message (invalid product type)
            header("Location: /stockupdate.php?message=invalid_type");
            exit(); // Ensure no further code is executed after redirection
    }
}
?>
