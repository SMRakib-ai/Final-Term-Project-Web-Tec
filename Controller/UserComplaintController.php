<?php
session_start();


if (!($_SESSION["isLoggedIn"] ?? false) || $_SESSION["role"] != 'user') {
    header("Location: ../View/login.php");
    exit;
}

include_once "../Model/Complaint.php";

$complaintModel = new Complaint();
$message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"] ?? "";
    $description = $_POST["description"] ?? "";
    $user_id = $_SESSION["user_id"];
    $status = "Pending";

    if ($title && $description) {
        $result = $complaintModel->addComplaint($user_id, $title, $description, $status);
        if ($result === true) {
            $message = "Complaint submitted successfully!";
        } else {
            $message = "Error: " . $result;
        }
    } else {
        $message = "All fields are required.";
    }
}


include "../View/User/UserComplaint.php";
