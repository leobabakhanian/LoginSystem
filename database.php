<?php
    session_start();
    // Connect to database using default username and password "root" and call database
    $db = mysqli_connect('localhost', 'root', 'root', 'database');
    $username = "";
    $errors = array();
  
    // Username & password are not being checked on a case sensitive basis
    // If login is clicked
    if (isset($_POST['login'])){
        // Set username and password to each
        $username = $_POST['username'];
        $password = $_POST['password'];

        // List of possible errors from user input
        // **SQL injection and invalid characters are not checked for**
        if (empty($username)){
            array_push($errors, "Username not entered");
        }
        if (empty($password)){
            array_push($errors, "Password not entered");
        }
        // If no errors, compare to stored values and bring corresponding page
        if (count($errors) == 0){
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($db, $query);

            // If any username and password combination matches those in the table
            if(mysqli_num_rows($result) > 0){
                $_SESSION['username'] = $username;
                
                if($username == 'Administrator' && $password == 'admin'){
                    // Redirect user to admin page
                    header('location: admin.php');
                }
                else{
                    // Redirect user to successful login page
                    header('location: main.php');
                }
            }
            else{
                array_push($errors, "Username or password is incorrect");
            }
        }
    }
    
    // If register is clicked
    if (isset($_POST['register'])){
        $username = $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        // Find if username that is inputted matches any in the database
        $query = "SELECT username FROM users WHERE username='$username' LIMIT 1";
        $dup = mysqli_query($db, $query);

        // List of possible errors from user input
        // **SQL injection and invalid characters are not checked for**
        if (empty($username)){
            array_push($errors, "Username not entered");
        }
        // If statement to display error for taken username
        if(mysqli_num_rows($dup) > 0){
            array_push($errors, "Username is already taken");
        }
        if (empty($password1)){
            array_push($errors, "Password not entered");
        }
        if ($password1 != $password2){
            array_push($errors, "Passwords do not match");
        }
        // If there are no errors, store username and password in database and redirect to success page
        if (count($errors) == 0){
            $password = $password1;
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            mysqli_query($db, $sql);
            header('location: success.php');
        }
    }

    // If logout is clicked
    if (isset($_GET['logout'])){
        // Destroy session on logout and redirect user back to login page
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
?>