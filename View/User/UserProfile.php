<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Profile</title>
<style>
 *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}

.navbar{
    background:#1e1e2f;
    color:white;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
   
    
    width:100%;
   
}
.navbar a{
    color:aliceblue;
    text-decoration:none;
    margin-left:10px;
}
 .logoutbtn{
    color: #0b075d;

    background-color: rgb(45, 18, 118);
    padding: 5px 10px;
   
   
    font-family: bolder;
}


th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
.btn {
    padding: 6px 12px;

  
    cursor: pointer;
}

#profileForm{
    width:400px;
    margin:50px auto;
    padding:20px;
    border:1px solid #ddd;
    border-radius:5px;
}
input{
    width:100%;
    padding:10px;
        margin:10px 0;
}
button{
    padding:10px 20px;
    background:green;
    color:white;
    border:none;
    cursor:pointer;
}


</style>
</head>
<body>

<div class="navbar">
    <h5>User Dashboard</h5>
    <a href="UserDashboardController.php">Dashboard</a>
    <a href="UserComplaintController.php">Complaint</a>
    <a href="UserProfileController.php">Profile</a>
   <a href="Logout.php" class="logoutbtn">Logout</a>
</div>

<div id="profileForm">
    <h2 style="text-align:center;">User Profile</h2>

    <?php if($success): ?>
        <p class="success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <?php if(isset($errors['general'])): ?>
        <p class="error"><?= htmlspecialchars($errors['general']) ?></p>
    <?php endif; ?>

    <form action="UpdateUserProfileController.php" method="POST">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">

        <input type="text" name="name" placeholder="Enter Name" value="<?= htmlspecialchars($user['name']) ?>" required>
        <span class="error"><?= $errors['name'] ?? '' ?></span>

        <input type="email" name="email" placeholder="Enter Email" value="<?= htmlspecialchars($user['email']) ?>" required>
        <span class="error"><?= $errors['email'] ?? '' ?></span>

        <input type="password" name="password" placeholder="Enter new password (leave blank to keep old)">
        <span class="error"><?= $errors['password'] ?? '' ?></span>

        <button type="submit">Update Profile</button>
    </form>
</div>

</body>
</html>
