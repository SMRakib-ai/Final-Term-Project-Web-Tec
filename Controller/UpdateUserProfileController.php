<?php
session_start();

if (!($_SESSION["isLoggedIn"] ?? false) || $_SESSION["role"] != 'user') {
    header("Location: ../View/login.php");
    exit;
}

include_once "../Model/User.php";
$userModel = new User();

$errors = [];

$id = $_POST['id'] ?? 0;
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$name) $errors['name'] = "Name required";
if (!$email) $errors['email'] = "Email required";

if (count($errors) > 0) {
    $_SESSION['errors'] = $errors;
    header("Location: UserProfileController.php");
    exit;
}

// Update user
$update = $userModel->updateUser($id, $name, $email, $password);
if ($update) {
    $_SESSION['success'] = "Profile updated successfully!";
} else {
    $_SESSION['errors'] = ['general' => 'Update failed!'];
}

header("Location: UserProfileController.php");
exit;
