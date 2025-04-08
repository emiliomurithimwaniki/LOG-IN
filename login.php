<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE username ='$usernameemail' OR email ='$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password ==$row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }
        else{
            echo
            "<script> alert('Wrong Password') </script>";

        }
    }
    else{
        echo
        "<script> alert('User Not Registered') </script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
    <form class="" action="" method="post" autocomplete="off">
   
    <div class="container">
        <div class="logo">
        <img src="img10.jpg" alt="Logo" width="100px" height="100px">
           
        </div>
            <h2>Log Into Your Account</h2>
            <input type="usernameemail" name="usernameemail" id="usernameemail" class="input-box" placeholder="Username Or Email" required autocomplete="$_COOKIE">
            <input type="password" name="password" id="password" class="input-box" placeholder="Password" required>
            <button type="submit" name="submit" class="login-btn">Sign In</button>
            <a href="forgot-password.html" class="forgot-password">Forgot Password?</a>
            <a href="registration.php" class="link">&laquo; New  to Travel.Com</a>
            <div class="footer">&copy; Travel.com | Terms | Privacy</div>
        </div>
    </form>

</body>
</html>