<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Napronet E System</title>
    <link rel="stylesheet" href="assets/Css/index.css">
    <script src="https://kit.fontawesome.com/0df6f8475c.js" crossorigin="anonymous"></script>

</head>
<body>
    <!-- Logo and Greeting -->
    <div class="container">
        <div class="loginheader">
            <img src="assets/images/logo-1-192x138.png" alt="" id="logo" width="250px" height="200px">
            <h1>Welcome</h1>
            <h2>Napronet Pvt Ltd E-Management System</h2>
        </div>

        <!-- Login Form - Connected with includes/logincontrol.php script -->
        <div class="loginbody">

            <form action="includes/logincontrol.php" method="post">
                <div id="usericon"><i class="fa-solid fa-user"></i></div>
                <label for="username" class="loginformlabel">Enter Your User Name</label>
                <input type="text" name="username" id="">
                <div class="loginpassword">
                    <label for="password" class="loginformlabel">Enter Your Password</label>
                    <input type="password" name="password" id="">
                </div>
                <?php
                // Display error message if it exists
                    if (isset($_GET['error'])) {
                    echo '<div class="error-message">' . htmlspecialchars($_GET['error']) . '</div>';
                    }
                ?>
                <button id="login-button">Login</button>
                    
            </form>
        </div>
    </div>



</body>
</html>