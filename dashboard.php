<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/Css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <?php 
        require_once "includes/session.php";
     
    ?>
    <!-- Main Nav Bar -->
    <div class="header">
        <a href="/dashboard.php"><button class="custom-btn btn-1">Stock Overview</button></a>
        <a href="/emmanager.php"><button class="custom-btn btn-1">Employee Manager</button></a>
        <a href="/attendance.php"><button class="custom-btn btn-1">Attendance</button></a>      
        <a href="/ordermanagement.php"><button class="custom-btn btn-1">Order Management</button></a>
        <a href="/inventory.php"><button class="custom-btn btn-1">Inventory</button></a>
        <div class="logo"><img src="/assets/images/logo-1-192x138.png" alt="" height="100px" width="120px"></div>
    </div>
    <!-- Real time clock with Js -->
    <div class="overview-wrapper">
        <div class="card_box">
            <div class="time">
                <img src="assets/images/clock.png" alt="" height="140px" width="150px" id="clockpng">
                <h3 class="time"><b>Today</b></h3>
                <h4 class="current-time" id="time"></h4>
                <p id="date"></p>   
            </div>      
        </div>

        <!-- Dynamic Username Display -->
        <div class="greeting">
            <div class="username">
                <h1>Hello <span id="user">Kavindu</span></h1>
                <h2>Welcome to Napronet E-Manager</h2>
                <button id="guide">E-Guide</button>
                <a href="/stockupdate.php"><button id="guide">Update Stocks</button></a>
            </div>
            <!-- Logout button -->
            <form action="/includes/logout.php" method="post">
                <div class="logout">
                    <button class="Btn" id="logoutBtn">
                    <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                    <div class="text">Logout</div>
                    </button>
                </div>
            </form>
          
        </div>

    </div>
    <!-- Current Stock overview - Coir pots -->
    <div class="dayoverview">
        <div class="stocks" id="coirpotstock">
            <h4 id="coirpot">Coir Pots Stock</h4>
            <table class="stocktable">
                <tr>
                    <th>Product Code</th>
                    <th>Item Name</th>
                    <th>Quantity In-Stock</th>
                </tr>
                <?php
                    require_once "includes/config.php";
                    // SQL query to fetch data from the database
                    $sql = "SELECT * FROM coirpots_readytoship";
                    $result = mysqli_query($db, $sql);

                    // Check if the query executed successfully and returned results
                if ($result && mysqli_num_rows($result) > 0) {
                    // Loop through the results and display them in the table
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['ProductCode'] . "</td>";
                        echo "<td>" . $row['ItemName'] . "</td>";
                        echo "<td>" . $row['CurrentStock'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No data available</td></tr>";
                }
                ?>
            </table>
        </div>

        <div class="stocks" id="discstock">
        <!-- Current stocks - Discs -->
            <h4 id="coirpot">Disc Stock</h4>
            <table class="stocktable">
                <?php
                    require_once "includes/config.php";
                    // SQL query to fetch data from the database
                    $sql = "SELECT * FROM discs_readytoship";
                    $result = mysqli_query($db, $sql);

                    // Check if the query executed successfully and returned results
                    if ($result && mysqli_num_rows($result) > 0) {
                    // Loop through the results and display them in the table
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['ProductCode'] . "</td>";
                            echo "<td>" . $row['ItemName'] . "</td>";
                            echo "<td>" . $row['CurrentStock'] . "</td>";
                            echo "</tr>";
                        }
                        } else {
                            echo "<tr><td colspan='3'>No data available</td></tr>";
                        }
                ?>

            </table>

        </div>
        <!-- Current day Attendance Overview -->
        <div class="stocks" id="attendance">
            <h4 id="coirpot">Today Attendance</h4>
            <table class="stocktable">
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>Chamila</td>
                    <td>Working</td>
                </tr>
                <tr>
                    <td>Rasika</td>
                    <td>Working</td>
                </tr>
                <tr>
                    <td>Thanuja</td>
                    <td>Absent</td>
                </tr>
                <tr>
                    <td>Madushanka</td>
                    <td>Working</td>
                </tr>
            </table>

        </div>
    </div>
        

    





    <script src="/assets/Js/dashboard.js"></script>
</body>
</html>

