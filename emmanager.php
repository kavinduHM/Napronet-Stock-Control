<?php
// Include the database configuration file
require_once "includes/config.php";
require_once "includes/session.php";

// Fetch data from the database
$sql = "SELECT * FROM employers";
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/Css/emmanager.css">
    <title>Employer Management</title>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <a href="/dashboard.php"><button class="custom-btn btn-1">Stock Overview</button></a>
        <a href="/emmanager.php"><button class="custom-btn btn-1">Employee Manager</button></a>
        <a href="/attendance.php"><button class="custom-btn btn-1">Attendance</button></a>      
        <a href="/ordermanagement.php"><button class="custom-btn btn-1">Order Management</button></a>
        <a href="/inventory.php"><button class="custom-btn btn-1">Inventory</button></a>
        <div class="logo"><img src="/assets/images/logo-1-192x138.png" alt="" height="100px" width="120px"></div>
    </div>
    
    <!-- Web Panel Introduction -->
    <div class="heading">
        <div class="blank"></div>
        <div class="head-text">
            <img src="/assets/images/empimage.png" alt="" height="175px" width="190px">
            <h2>Employer Management System</h2>
            <a href="/EmployerEdit.php"><p>View / Add / Remove / Edit Employer Details</p></a>
        </div>
    </div>
    
    <!-- Current Employer data -->
    <div class="current-emp">
        <div class="permanant-emp">
            <h3>Permanent Employer Details</h3>
            <table class="permanant-em-table">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Pay / Per day</th>
                </tr>
                <?php
                // Output data from the database
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ContactNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Department']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Position']) . "</td>";
                    echo "<td>Rs." . htmlspecialchars($row['DayPayRate']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

</body>
</html>
