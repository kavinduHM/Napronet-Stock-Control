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
            echo "Stock updated successfully.";
        } else {
            echo "Error updating stock: " . $db->error;
        }
    } else {
        echo "Invalid product type.";
    }
}
?>
