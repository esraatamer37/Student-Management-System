<?php
session_start();

require_once "./db_connect.php";

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];

    $image = $_FILES['image']['name'];
    if ($image) {
        $target = "uploads/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $stmt = $conn->prepare("UPDATE students SET first_name=?, last_name=?, phone=?, image=? WHERE id=?");
        $stmt->bind_param("ssssi", $first_name, $last_name, $phone, $image, $id);
    } else {
        $stmt = $conn->prepare("UPDATE students SET first_name=?, last_name=?, phone=? WHERE id=?");
        $stmt->bind_param("sssi", $first_name, $last_name, $phone, $id);
    }
    
    if ($stmt->execute()) {
        $_SESSION['success'] = 'Record updated successfully!';
        header("Location: ./index.php");
        exit(); 
    } else {
        echo 'Error updating record: ' . $stmt->error;
    }
    
    $stmt->close();
}
?>

