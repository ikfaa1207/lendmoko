<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vladlend";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$email = empty($_POST['email']) ? 'None' : $_POST['email'];
$phone = $_POST['phone'];
$status = $_POST['status'];


// Insert data into database
$sql = "INSERT INTO loan_officer (username, password, full_name, email, phone_number, status)
VALUES ('$username', '$password', '$fullname', '$email', '$phone', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "New loan officer created successfully";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
