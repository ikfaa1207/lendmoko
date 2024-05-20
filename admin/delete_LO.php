<?php
$host = 'localhost';
$dbname = 'vladlend';
$username = 'root';
$password = '';

$mysqli = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// The ID of the loan officer you want to delete

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $loanOfficerId = $_GET['id'];

    $sql = "UPDATE loan_officer SET IsDeleted = 1 WHERE loan_officer_id = ?";
    $stmt = $mysqli->prepare($sql);

    // Bind the loan officer id to the statement
    $stmt->bind_param('i', $loanOfficerId);

    $stmt->execute();
} else {
    echo "Error: id is not set or is empty";
}

// Execute the statement
if ($stmt->execute()) {
    echo "Loan officer soft-deleted successfully.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and the connection
$stmt->close();
$mysqli->close();
