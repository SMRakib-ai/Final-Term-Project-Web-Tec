<?php
session_start();
if (!($_SESSION["isLoggedIn"] ?? false) || $_SESSION["role"] != 'user') {
    header("Location: ../View/login.php");
    exit;
}

include_once "../Model/Complaint.php";
$complaintModel = new Complaint();

$edit_id = $_SESSION['edit_id'] ?? 0;
if (!$edit_id) {
    header("Location: UserDashboardController.php");
    exit;
}

$complaint = $complaintModel->getComplaintById($edit_id);
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

include "../View/User/EditComplaint.php";
