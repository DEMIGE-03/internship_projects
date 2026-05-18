<?php
session_start();

// Redirect if already logged in
if(isset($_SESSION['user_id'])){
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<div class="login-container">
    <h2>Welcome User</h2><br>
    <?php
    if(isset($_GET['error'])){
        echo "<p style='color:red;'>Invalid Email or Password</p>";
    }
    ?>
    <form action="authorization/loginAuth.php" method="POST">

        <label>Email:</label>
        <input type="email" name="email" placeholder="Enter your Email...." required>

        <label>Password:</label>
        <input type="password" name="password" placeholder="Enter your Password..." required>

        <button type="submit" name="login">
            Login
        </button>
    </form>
        <div class="form-lower">
            <a href="#">About our system</a><br>
            <a href="#">For support Help</a>
        </div>
</div>


</body>
</html>