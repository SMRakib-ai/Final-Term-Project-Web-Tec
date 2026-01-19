<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
</head>
<body>
<div class="navbar">
    <h5>User Dashboard</h5>
    <a href="UserDashboardController.php">Dashboard</a>
    <a href="UserComplaintController.php">Complaint</a>
    <a href="UserProfileController.php">Profile</a>
   <a href="Logout.php" class="logoutbtn">Logout</a>

</div>

<h2>Your Complaints</h2>
<table style="width:100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if($complaints && $complaints->num_rows > 0): ?>
            <?php while($row = $complaints->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= htmlspecialchars($row['description']) ?></td>
                    <td><?= $row['status'] ?></td>
                    <td>
                        <form method="POST" action="UserComplaintActionController.php">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="action" value="Edit" class="btn">Edit</button>
                            <button type="submit" name="action" value="Delete" class="btn">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">You have no complaints.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
</body>
</html>
