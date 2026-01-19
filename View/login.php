<?php
session_start();

if ($_SESSION["isLoggedIn"] ?? false) {
    header("Location: dashboard.php");
}

$previousValues = $_SESSION["previousValues"] ?? [];
$errors = $_SESSION["errors"] ?? [];
$loginErr = $_SESSION["loginErr"] ?? "";
$successMsg = $_SESSION["successMsg"] ?? "";

unset($_SESSION["errors"]);
unset($_SESSION["previousValues"]);
unset($_SESSION["loginErr"]);
unset($_SESSION["successMsg"]);

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
        <?php if ($successMsg): ?>
    <p style="color:green; text-align:center;"><?php echo $successMsg; ?></p>
<?php endif; ?>
        <form action="../Controller/LoginValidation.php" method="Post">
            <h2 style="text-align: center; color: #00074f; font-family: Arial, sans-serif;">Welcome to the Login Page</h2>
           
          <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $previousValues['email'] ?? ''; ?>">
            <span><?php echo $errors['email'] ?? ''; ?></span>
 <br>
               <input type="password" name="password" id="password" placeholder="enter your password" required>
               <span><?php echo $errors['password'] ?? ''; ?></span>
               <br>


            <input type="radio" id="admin" name="type" id="admin" value="admin" <?php if(($previousValues['type'] ?? '')=='admin') echo 'checked'; ?>> Admin
           

            <input type="radio" id="User" name="type" id="User" value="User" <?php if(($previousValues['type'] ?? '')=='user') echo 'checked'; ?>> User
            <span><?php echo $errors['type'] ?? ''; ?></span><br>
          
           
           <span><?php echo $loginErr; ?></span><br>
            <input type="submit" id="btn" value="Login">

           <br>
         <a href="register.php" id="btn">Sign Up</a>

        </form>
          
    </div>

    
</body>
</html>
