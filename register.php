<?php 
    include('database.php'); // Call database file to pass user inputs into
    include('acc.php'); // Call admin account creation
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration Page</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body class="wrapper">
        <div class="header">
            <h2>Register</h2>
        </div>

        <form method="post" action="register.php">
            <?php include('errors.php'); // Display errors at top of form ?>
            <div class="inputs">
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="inputs">
                <label>Password:</label>
                <input type="password" name="password1">
            </div>
            <div class="inputs">
                <label>Confirm Password:</label>
                <input type="password" name="password2">
            </div>
            <div class="inputs">
                <button type="submit" name="register" class="btn">Register</button>
            </div>
            <div class="ask">
                <p>
                    <!-- Redirect user to login page -->
                    Already have an account? <a href="login.php">Log in</a>
                </p>
            </div>
        </form>
    </body>
</html>