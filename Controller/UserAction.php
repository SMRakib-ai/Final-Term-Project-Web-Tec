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
    $action = $_POST['action'] ?? '';

    if ($id) {
        if ($action == 'Delete') {
            $db->deleteUser($conn, $id);
        }
        elseif ($action == 'Edit') {
          
            header("Location: ../View/Admin/EditUser.php?id=$id");
            exit;
        }
    }
    header("Location: ../View/Admin/adminDashboard.php");
    exit;
}
