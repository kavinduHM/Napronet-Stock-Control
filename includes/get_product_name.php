<?php
// Include the database configuration file
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productId = $_POST['productId'];
    $productType = $_POST['productType'];

    // Determine the table name based on product type
    $tableName = '';
    if ($productType == 'Coir Pot') {
        $tableName = 'coirpots_readytoship';
    } elseif ($productType == 'Disc') {
        $tableName = 'discs_readytoship';
    }

    // Fetch product name from the appropriate table
    if (!empty($tableName)) {
        // This is just a basic example, you should perform appropriate sanitization and validation
        $sql = "SELECT ItemName FROM $tableName WHERE ProductCode = '$productId'";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            // Output product name
            $row = $result->fetch_assoc();
            echo $row["ItemName"];
        } else {
            echo "Product not found";
        }
    } else {
        echo "Invalid product type";
    }
}
?>
