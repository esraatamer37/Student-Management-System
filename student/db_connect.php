

<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'school';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name']; 
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $image = $_FILES['image']['name'];

 
    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);


    $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, phone, image) VALUES (?, ?, ?, ?)");
    

    $stmt->bind_param("ssss", $first_name, $last_name, $phone, $image);

    if ($stmt->execute()) {
        echo "Message saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}
?>




