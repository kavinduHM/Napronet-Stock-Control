<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/Css/stockform.css">
    <title>Stock Update</title>
</head>
<body>

    <!-- Main Nav Bar -->
    <div class="header">
        <a href="/dashboard.php"><button class="custom-btn btn-1">Stock Overview</button></a>
        <a href="/emmanager.php"><button class="custom-btn btn-1">Employee Manager</button></a>
        <a href="/attendance.php"><button class="custom-btn btn-1">Attendance</button></a>      
        <a href="/ordermanagement.php"><button class="custom-btn btn-1">Order Management</button></a>
        <a href="/inventory.php"><button class="custom-btn btn-1">Inventory</button></a>
        <div class="logo"><img src="/assets/images/logo-1-192x138.png" alt="" height="100px" width="120px"></div>
    </div>

    <div class="stockUpdateTop">
        <h1>Update / Add / Remove the Current Stocks</h1>
    </div>



<div class="updateForm">
    <form id="stockUpdateForm" action="/includes/stock.php" method="post">
        <label for="productType">Product Type :</label>
            <select name="productType" id="product-Type">
                <option value="Coir Pot">Coir Pot</option>
                <option value="Disc">Coir Compost Discs</option>
            </select>
    <label for="productId">Product Code:</label>
        <select name="productId" id="productId">
            <option value="CP-116">CP-116</option>
            <option value="CP-117">CP-117</option>
            <option value="CP-124">CP-124</option>
            <option value="CP-125">CP-125</option>
            <option value="CP 120">CP120</option>
            <option value="CP 133">CP133</option>
            <option value="CP 134">CP134</option>
            <option value="CP 138">CP138</option>
        </select>
    <label for="productName">Product Name:</label>
    <input type="text" id="productName" name="productName" readonly>
    <label for="updateamount">No. Units to Add / Remove</label>
    <input type="number" name="updateAmount" id="">
        <select name="addRemove" id="">
            <option value="add">Add Stock</option>
            <option value="remove">Remove Stock</option>
        </select>
    <input type="submit" value="Submit" id="submitButton">
        <!-- Error / Success Message -->
        <?php
    // Check if a message query parameter is present in the URL
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        
        // Display appropriate message based on the value of the message parameter
        if ($message === 'success') {
            echo '<p style="color: white;">Stock updated successfully.</p>';
        } elseif ($message === 'error') {
            echo '<p style="color: red;">Error updating stock.</p>';
        } elseif ($message === 'invalid_type') {
            echo '<p style="color: red;">Invalid product type.</p>';
        }
    }
    ?>
    </form>

</div>




<script>
document.getElementById('productId').addEventListener('change', function() {
    var productId = this.value;
    var productType = document.getElementById('product-Type').value;

    // Send AJAX request to fetch product name
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/includes/get_product_name.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('productName').value = xhr.responseText;
        }
    };
    xhr.send('productId=' + productId + '&productType=' + productType);
});
</script>

    
</body>
</html>