<?php
session_start();
if (!($_SESSION["isLoggedIn"] ?? false) || $_SESSION["role"] != 'user') {
    header("Location: ../View/login.php");
    exit;
}

include_once "../Model/Complaint.php";

$complaintModel = new Complaint();

$id = $_POST['id'] ?? 0;
$action = $_POST['action'] ?? '';

if ($action == "Delete") {
    $complaintModel->deleteComplaint($id);
    $_SESSION['success'] = "Complaint deleted successfully!";
}

if ($action == "Edit") {
    
    $_SESSION['edit_id'] = $id;
    header("Location: EditComplaintController.php");
    exit;
}

header("Location: UserDashboardController.php");
exit;
