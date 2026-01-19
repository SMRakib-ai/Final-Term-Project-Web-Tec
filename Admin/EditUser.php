<?php
session_start();
if (!($_SESSION["isLoggedIn"] ?? false) || $_SESSION["role"] != 'admin') {
    header("Location: ../../View/login.php");
    exit;
}

include "../../Model/DB.php";
$db = new DatabaseConnection();
$conn = $db->openConnection();

$id = $_GET['id'] ?? '';
if (!$id) {
    header("Location: adminDashboard.php");
    exit;
}

// Fetch user details
$sql = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
if (!$user) {
    header("Location:../../Admin/ adminDashboard.php");
    exit;
}

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit User</title>
<style>
*{margin:0; padding:0; box-sizing:border-box; font-family: Arial, sans-serif;}
.form-container{width:400px; margin:50px auto; padding:20px; border:1px solid #ddd; border-radius:5px;}
input, select{width:100%; padding:10px; margin:10px 0;}
button{padding:10px 20px; background:green; color:white; border:none; cursor:pointer;}
.error{color:red; font-size:14px;}
</style>
</head>
<body>

<div class="form-container">
<h2>Edit User</h2>
<form action="../../Controller/UpdateUser.php" method="POST">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">

    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
    <span class="error"><?= $errors['name'] ?? '' ?></span>

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
    <span class="error"><?= $errors['email'] ?? '' ?></span>

    <label>Role:</label>
    <select name="role" required>
        <option value="user" <?= $user['role']=='user' ? 'selected':'' ?>>User</option>
        <option value="admin" <?= $user['role']=='admin' ? 'selected':'' ?>>Admin</option>
    </select>
    <span class="error"><?= $errors['role'] ?? '' ?></span>

    <button type="submit">Update User</button>
</form>
<a href="adminDashboard.php">Back to Dashboard</a>
</div>

</body>
</html>
