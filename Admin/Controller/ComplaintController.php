<?php
session_start();

if (!($_SESSION["isLoggedIn"] ?? false) || $_SESSION["role"] != 'user') {
    header("Location: ../../View/login.php");
    exit;
}

include_once "../Model/Complaint.php";

$message = "";
$complaintModel = new Complaint();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"] ?? "";
    $description = $_POST["description"] ?? "";
    $status = $_POST["status"] ?? "Pending";
    $user_id = $_SESSION["user_id"];

    if ($title && $description) {
        $result = $complaintModel->addComplaint($user_id, $title, $description, $status);
        $message = $result === true ? "Complaint submitted successfully!" : "Error: " . $result;
    } else {
        $message = "All fields are required.";
    }
}

// Load the view
include "../View/User/UserComplaint.php";
?>
