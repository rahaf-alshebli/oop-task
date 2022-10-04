<?php 
    require_once("../includes/connection.php");

    if(isset($_SESSION['login']))
    {
        header('location: ../index.php');
    }
    else{
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PHP Advance Tasks</title>
    
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <section id="loginHome">
        <div class="loginContainer">
            <div class="loginTitle">
                <h1>Login</h1>
            </div>
            <div class="loginSubTitle">
                <p>Welcome back! Login with your Credentials</p>
            </div>
            <div class="formContainer">
                <form action="user.php" class="loginForm" method="POST">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" required />
                    <label for="password">Password</label>
                    <input type="password" name="pass" placeholder="Enter your Password" required />
                    <button name="login">Login</button>
                </form>
            </div>
            <div class="signup">
                <p>Don't have an account? <a href="signup.php">&nbsp;Sign Up</a></p>
            </div>
        </div>
    </section>
    
</body>
</html>