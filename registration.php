<?php
require 'config.php';

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $duplicate = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username' OR email = '$email'");

    if(mysqli_num_rows($duplicate) > 0){
        echo "<script> alert('Username or Email Has Already Been Taken')</script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_users (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";
            mysqli_query($conn, $query);
            echo "<script> alert('Registration Successful')</script>";
        }
        else{
            echo "<script> alert('Passwords do not match')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    
    <form action="" method="post" autocomplete="$_COOKIE">
        <div class="container">
            <div class="logo">
                <img src="img10.jpg" alt="Logo" width="100px" height="100px">
            </div>
            <h2>Create Your Account</h2>
            <input type="name" name="name" id="name"class="input-box" placeholder="Your Name" required>
            <input type="username"name="username" id="username" class="input-box" placeholder="Username" required>
            <input type="email" name="email" id="email" class="input-box" placeholder="Email" required>
            <input type="password" name="password" id="password" class="input-box" placeholder="Password" required>
            <input type="confirmpassword" name="confirmpassword" id="confirmpassword" class="input-box" placeholder="Confirm Password" required>
            <div>
                <input type="checkbox" class="checkbox" id="terms">
                <label for="terms">I agree to the <a href="#" class="link">Terms of Service</a></label>
            </div>
            <button class="btn" disabled id="registerBtn" type="submit" name="submit">Register</button>
            <a href="login.php" class="link">&laquo; Back to Login</a>
            <div class="footer">&copy; Travel.com | Terms | Privacy</div>
        </div> 
    </form>
    <script src="register.js"></script>
    
</body>
</html>
