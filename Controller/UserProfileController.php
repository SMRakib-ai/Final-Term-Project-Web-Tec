<?php
session_start();

// Only user can access
if (!($_SESSION["isLoggedIn"] ?? false) || $_SESSION["role"] != 'user') {
    header("Location: ../View/login.php");
    exit;
}

include_once "../Model/User.php";

$userModel = new User();
$email = $_SESSION['email'];
$user = $userModel->getUserByEmail($email);

$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? '';
unset($_SESSION['errors'], $_SESSION['success']);

// Load view
include "../View/User/UserProfile.php";
