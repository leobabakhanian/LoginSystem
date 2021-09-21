<?php 
    include('database.php'); // Call database file to pass user inputs into
    include('acc.php'); // Call admin account creation
    if(empty($_SESSION['username'])){
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body class="wrapper">
        <div class="header">
            <h2>Log In</h2>
        </div>

        <form method="post" action="login.php">
            <?php include('errors.php'); ?>
            <div class="inputs">
                <label>Username:</label>
                <input type="text" name="username">
            </div>
            <div class="inputs">
                <label>Password:</label>
                <input type="password" name="password">
            </div>
            <div class="inputs">
                <button type="submit" name="login" class="btn">Login</button>
            </div>
            <div class="ask">
                <p>
                    <!-- Redirect user to registration page -->
                    Not registered yet? <a href="register.php">Sign up</a>
                </p>
            </div>
        </form>
    </body>
</html>