<?php

session_start();

require_once "./db_connect.php";

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM students WHERE id =  $id");

if ($stmt->execute()) {

    $_SESSION['success'] = 'Class deleted successfully!';
    header("Location: ./index.php");
    exit(); 
} else {
    echo 'Error deleting record: ' . $stmt->error;
}

?>



