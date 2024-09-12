<?php
include "db_connect.php";

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id = $id");
$student = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
</head>
<body>
    <form action="update.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
        <input type="text" name="first_name" value="<?= $student['first_name'] ?>" required>
        <input type="text" name="last_name" value="<?= $student['last_name'] ?>" required>
        <input type="text" name="phone" value="<?= $student['phone'] ?>" required>
        <input type="file" name="image">
        <button type="submit">Update Student</button>
    </form>
</body>
</html>