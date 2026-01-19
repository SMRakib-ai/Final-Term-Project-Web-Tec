<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Complaint</title>
<style>
body{
    font-family:Arial;
    margin:20px;
}
form{
    width:400px;
    margin:auto;
    padding:20px;
    border:1px solid #ddd;
    border-radius:5px;
}
input, textarea, button{
    width:100%;
    padding:8px;
    margin:5px 0;
}
button{
    background:green;
    color:white;
    border:none;
    cursor:pointer;
}
.error{
    color:red;
    font-size:0.9em;}
</style>
</head>
<body>
<h2 style="text-align:center;">Edit Complaint</h2>

<form action="UpdateComplaintController.php" method="POST">
    <input type="hidden" name="id" value="<?= $complaint['id'] ?>">
    <input type="text" name="title" placeholder="Title" value="<?= htmlspecialchars($complaint['title']) ?>" required>
    <span class="error"><?= $errors['title'] ?? '' ?></span>

    <textarea name="description" placeholder="Description" rows="4" required><?= htmlspecialchars($complaint['description']) ?></textarea>
    <span class="error"><?= $errors['description'] ?? '' ?></span>

    <button type="submit">Update Complaint</button>
</form>
</body>
</html>
