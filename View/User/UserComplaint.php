<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Complaint</title>
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
input, textarea, button {
    width: 100%;
     padding: 8px; 
     margin: 5px 0;
    }
    

    </style>
</head>
<body>
<div class="navbar">
    <h5>User Dashboard</h5>
     <a href="UserDashboardController.php">Dashboard</a>
    <a href="UserComplaintController.php">Complaint</a>
    <a href="UserProfileController.php">Profile</a>
   <a href="Logout.php" class="logoutbtn">Logout</a>
</div>

<h2>Submit a Complaint</h2>
<form id="complaintForm" method="POST" action="">
    <input type="text" name="title" placeholder="Complaint Title" required>
    <textarea name="description" placeholder="Complaint Description" rows="4" required></textarea>
    <select name="status" disabled>
        <option value="Pending">Pending</option>
    </select>
    <button type="submit">Submit Complaint</button>
</form>

<?php if($message): ?>
    <div class="message"><?= htmlspecialchars($message) ?></div>
<?php endif; ?>
</body>
</html>
