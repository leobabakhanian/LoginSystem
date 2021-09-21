<?php 
    $db = mysqli_connect('localhost', 'root', 'root', 'database');
    $userA = "Administrator";
    $passA = "admin";
    
    // If this is the first time running this file
    if(!isset($_SESSION['first_time'])){
        $_SESSION['first_time'] = 1;
        $query = "SELECT username FROM users WHERE username='$userA' AND password '$passA' LIMIT 1";
        $dup = mysqli_query($db, $query);

        // If there are no admin accounts, create admin account
        if(mysqli_num_rows($dup) > 0){
            $sql = "INSERT INTO users (username, password) VALUES ('$userA', '$passA')";
            mysqli_query($db, $sql);
        }
    }
?>