<?php
session_start();
if (!($_SESSION["isLoggedIn"] ?? false) || $_SESSION["role"] != 'user') {
    header("Location: ../View/login.php");
    exit;
}

include_once "../Model/Complaint.php";
$complaintModel = new Complaint();

$id = $_POST['id'] ?? 0;
$title = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');
$errors = [];

if (!$title) $errors['title'] = "Title required";
if (!$description) $errors['description'] = "Description required";

if (count($errors) > 0) {
    $_SESSION['errors'] = $errors;
    header("Location: EditComplaintController.php");
    exit;
}

$complaintModel->updateComplaint($id, $title, $description);
unset($_SESSION['edit_id']);

header("Location: UserDashboardController.php");
exit;
