<?php

session_start();
include "../config/db.php";

// LOGIN USER
if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check user by email
    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn, $sql);

    // For existing user
    if(mysqli_num_rows($result) == 1){

        $user = mysqli_fetch_assoc($result);

        // Verify hashed password
        if(password_verify($password, $user['password'])){

        // Update last login
            $user_id = $user['id'];

        $update = "UPDATE users 
                   SET last_login = CURRENT_TIMESTAMP 
                   WHERE id = '$user_id'";

            mysqli_query($conn, $update);

            // Create sessions
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            // Redirect
            header("Location: ../dashboard.php");
            exit();

        } else {

            header("Location: ../login.php?error=1");
            exit();

        }

    } else {

        header("Location: ../login.php?error=1");
        exit();

    }
}
?>