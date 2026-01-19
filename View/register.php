<?php
session_start();
$errors = $_SESSION["errors"] ?? [];
unset($_SESSION["errors"]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<body>
    <div id="form">
        <form action="../Controller/RegisterValidation.php" method="Post">
            <h2 style="text-align: center; color: #00074f; font-family: Arial, sans-serif;">Create Your New Account</h2>
            <input type="text" name="name" id="name" placeholder="enter your Name" required>
            <span><?php echo $errors['name'] ?? ''; ?></span>
            <br>
            <input type="email" name="email" id="email" placeholder="enter your email" required>
 <span><?php echo $errors['email'] ?? ''; ?></span><br>
               <input type="password" name="password" id="password" placeholder="enter your password" required>
               <span><?php echo $errors['password'] ?? ''; ?></span><br>


<input type="radio" name="type" value="user"> User
<span><?php echo $errors['type'] ?? ''; ?></span><br>
           
            <br>
           
           
            <input type="submit" id="btn" value="Register">

           <br>
           <a href="login.php" id="btn">Already have an account?</a>

        </form>
          
    </div>
    

    
</body>
</html>
