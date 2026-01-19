<?php
session_start();
if (!($_SESSION["isLoggedIn"] ?? false) || $_SESSION["role"] != 'admin') {
    header("Location: ../View/login.php");
    exit;
}

include "../Model/DB.php";
$db = new DatabaseConnection();
$conn = $db->openConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? '';
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $role = $_POST['role'] ?? '';

    $errors = [];

    if (!$name) $errors['name'] = "Name is required";
    if (!$email) $errors['email'] = "Email is required";
    if (!$role) $errors['role'] = "Role is required";

    if ($errors) {
        $_SESSION['errors'] = $errors;
        header("Location: ../View/Admin/EditUser.php?id=$id");
        exit;
    }

    $db->updateUser($conn, $id, $name, $email, $role);
    header("Location: ../View/Admin/adminDashboard.php");
    exit;
}
