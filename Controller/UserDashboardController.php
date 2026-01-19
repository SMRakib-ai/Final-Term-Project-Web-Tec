<?php
session_start();


if (!($_SESSION["isLoggedIn"] ?? false) || $_SESSION["role"] != 'user') {
    header("Location: ../../View/login.php");
    exit;
}

include_once "../Model/Complaint.php";

$user_id = $_SESSION["user_id"] ?? 0;

$complaintModel = new Complaint();
$complaints = $complaintModel->getComplaintsByUser($user_id);


include "../View/User/UserDashboard.php";
