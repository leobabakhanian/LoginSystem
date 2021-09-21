<?php include('database.php'); // Call database file to pass user inputs into
    if(empty($_SESSION['username'])){
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body class="wrapper">
        <div class="adminheader">
            <h2>Admin Panel</h2>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
            <?php
                $db = mysqli_connect('localhost', 'root', 'root', 'database');
                // Sort table by ascending order
                $query = "SELECT userId, username, password FROM users ORDER BY username ASC";
                $result = mysqli_query($db, $query);
                
                // Run loop to print out all rows of database table
                if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>" . $row['userId'] . "</td><td>" . $row['username'] . "</td><td>" . $row[
                            'password'] . "</td></tr>";
                    }
                    echo "</table>";
                }
            ?>
        <!-- Logout that redirects user to login page -->
        <div class="logoutA">
            <p><a href="login.php">Log out</a></p>
        </div>
    </body>
</html>
