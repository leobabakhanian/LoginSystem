<?php include('database.php'); // Call database file to pass user inputs into ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome Page</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">

        <script>
            function changeBackground(){
                // Generate a random number
                var randColor = Math.floor(Math.random()*16777215).toString(16);
                // Pass random number with hex tag to change background color style
                document.body.style.background = '#' + randColor;
            }
            // Initializer function
            function init(){
                // Add eventlistener to color button which calls the changeBackground function
                var button = document.getElementById('myBtn');
                button.addEventListener("click", changeBackground);
            }

            window.addEventListener('load', init);
        </script>
    </head>

    <body class="wrapper">
        <div class="header">
            <h2>Logged In!</h2>
        </div>
        <div class="content">
            <?php if (isset($_SESSION['username'])): ?>
                <p class="welcome">
                    <!-- Welcome user with corresponding user value -->
                    Welcome <strong class="welcomeUser"><?php echo $_SESSION['username']; ?></strong>!
                </p>
                <!-- Button to change background to random color -->
                <input type="button" value="Colorize" id="myBtn" class="myBtn">
                <!-- Logout that redirects user to login page -->
                <div class="logout">
                    <p><a href="login.php">Log out</a></p>
                </div>
            <?php endif ?>
    </body>
</html>