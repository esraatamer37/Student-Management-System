<?php
include "db_connect.php";

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<link rel="stylesheet" href="style.css">

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students</title>
</head>
<body>
    <h1>Students List</h1>
    <a href="create_student.php" class="add-student-button"><button>Add Student</button></a>
    <link rel="stylesheet" href="style.css">

    <table border="1">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['first_name'] ?></td>
            <td><?= $row['last_name'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><img src="uploads/<?= htmlspecialchars($row['image']) ?>" alt="Student Image" style="width: 100px; height: 100px;">
            </td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
