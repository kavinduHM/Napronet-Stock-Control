<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/Css/empEdit.css">
    <title>Edit / Manage Employer Data</title>
</head>
<body>
    <div class="header">
        <a href="/dashboard.php"><button class="custom-btn btn-1">Stock Overview</button></a>
        <a href="/emmanager.php"><button class="custom-btn btn-1">Employee Manager</button></a>
        <a href="/attendance.php"><button class="custom-btn btn-1">Attendance</button></a>      
        <div class="logo"><img src="/assets/images/logo-1-192x138.png" alt="" height="100px" width="120px"></div>
    </div>

    <div class="EmpUpdateTop">
        <h1>Update / Add / Remove the Current Stocks</h1>
    </div>


    <div class="updateForm">

        <form action="/includes/EmpUpdate.php" method="post" id="EmUpdate">
            <label for="name">Employer Name :</label>
            <input type="text" required name="Name" >
            <label for="address">Address</label>
            <input type="text" required name="Address">
            <label for="contact">Contact Number</label>
            <input type="tel" required name="ContactNumber">
            <label for="department">Department</label>
            <select name="Department" id="Department" required  >
                <option value="Production">Production</option>
                <option value="Warehouse">Warehouse</option>
            </select>
            <label for="position">Position</label>
            <select name="Position" id="" required>
                <option value="Supervisor">Supervisor</option>
                <option value="MachineOperator">Machine Operator</option>
                <option value="worker">General Worker</option>
                <option value="cleaner">Cleaner</option>
                <option value="Mechanic">Mechanic</option>
            </select>
            <label for="payment">Pay Rate Per Day</label>
            <input type="number" name="DayPayRate" id="">
            <input type="submit" value="Submit" id="submitButton">
            <?php
                // Check if a message query parameter is present in the URL
                if (isset($_GET['message'])) {
                    $message = $_GET['message'];
                if ($message === 'success') {
                    echo '<p style="color: white;">Data updated successfully.</p>';
                } elseif ($message === 'error') {
                    echo '<p style="color: red;">Error updating data.</p>';
                    }
                }
            ?>
        </form>

    </div>
    <div class="remove"><h1>Remove Employee</h1></div>
    <div class="removeEmp">
        <form action="/includes/removeEmp.php" method="post" id="removeForm">
            <label for="Name">Select Name</label>
            <select name="Name" id="">
                <option value="Select">Select</option>
                <?php
                    // Include the database configuration file
                require_once "includes/config.php";

                    // Query to select all names from the employers table
                $sql = "SELECT Name FROM employers";
                $result = $db->query($sql);

                    // Check if any rows were returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['Name'] . '">' . $row['Name'] . '</option>';
                }
            } else {
                echo '<option value="">No names found</option>';
            }
            ?>
        </select>
        <input type="submit" value="Remove">
    </form>
</div>


    
</body>
</html>