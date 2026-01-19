<?php
session_start();
if (!($_SESSION["isLoggedIn"] ?? false) || $_SESSION["role"] != 'admin') {
    header("Location: ../View/login.php");
    exit;
}

include "../Model/DB.php";
$db = new DatabaseConnection();
$conn = $db->openConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? '';
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $errors = [];

    if(!$name) $errors['name'] = "Name is required";
    if(!$email) $errors['email'] = "Email is required";

    if($errors){
        $_SESSION['errors'] = $errors;
        header("Location: ../View/Admin/Profile.php");
        exit;
    }

    $db->updateProfile($conn, $id, $name, $email, $password);

    $_SESSION['success'] = "Profile updated successfully!";
    $_SESSION['email'] = $email; 
    header("Location: ../View/Admin/Profile.php");
    exit;
}
