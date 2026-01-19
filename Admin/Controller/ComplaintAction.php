<?php
session_start();
if (!($_SESSION["isLoggedIn"] ?? false) || $_SESSION["role"] != 'admin') {
    header("Location: ../View/login.php");
    exit;
}

include "../Model/DB.php";

$id = $_POST['id'] ?? '';
$action = $_POST['action'] ?? '';

if ($id && $action) {
    $db = new DatabaseConnection();
    $conn = $db->openConnection();

    $status = '';
    if ($action == 'In Progress') $status = 'In Progress';
    elseif ($action == 'Solved') $status = 'Solved';

    if ($status) {
        $db->updateComplaintStatus($conn, $id, $status);
    }
}

header("Location: ../View/Admin/AssignComplaints.php");
exit;
