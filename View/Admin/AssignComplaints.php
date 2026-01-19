<?php
session_start();
if (!($_SESSION["isLoggedIn"] ?? false)) {
    header("Location: login.php");
}
include "../../Model/DB.php";
$db = new DatabaseConnection();
$conn = $db->openConnection();
$complaints = $db->getAllComplaints($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminDashboard</title>
</head>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}

.navbar{
    background:#1e1e2f;
    color:white;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
   
    
    width:100%;
   
}
.navbar a{
    color:aliceblue;
    text-decoration:none;
    margin-left:10px;
}
 .logoutbtn{
    color: #0b075d;

    background-color: rgb(45, 18, 118);
    padding: 5px 10px;
   
   
    font-family: bolder;
}


th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
.btn {
    padding: 6px 12px;

  
    cursor: pointer;
}



</style>
<body>
    
   <div class="navbar">
    <h5>Admin Dashboard</h5>
        <a href="../../View/Admin/adminDashboard.php">Dashboard</a>
        <a href="../../View/Admin/AssignComplaints.php">Assign Complaints</a>
        <a href="../../View/Admin/Profile.php">Profile</a>
       
       <a href="../../Controller/Logout.php" class="logoutbtn">Logout</a>
   </div>
    <table style="width: 100%;">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Complaint</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

     <?php while($row = $complaints->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['user_id'] ?></td>
        <td><?= $row['title'] ?></td>
        <td class="status-<?= $row['status'] ?>"><?= $row['status'] ?></td>
        <td>
            <form method="POST" action="../../Controller/ComplaintAction.php">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <button type="submit" name="action" value="In Progress" class="btn-approve">In Progress</button>
                <button type="submit" name="action" value="Solved" class="btn-reject">Solved</button>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>
      
    </table>
    
</body>
</html>