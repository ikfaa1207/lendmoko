<?php
// Database connection
$mysqli = new mysqli('localhost', 'root', '', 'vladlend');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $loanOfficerId = $_GET['id'];

    $sql = "UPDATE loan_officer SET status = 'inactive' WHERE loan_officer_id = ?";
    $stmt = $mysqli->prepare($sql);

    // Bind the loan officer id to the statement
    $stmt->bind_param('i', $loanOfficerId);

    if ($stmt->execute()) {
        // Redirect to the previous page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "Error: id is not set or is empty";
}

$mysqli->close();
