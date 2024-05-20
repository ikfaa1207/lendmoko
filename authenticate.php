<?php
$host = 'localhost';
$db   = 'vladlend';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

// Get the username and password from the form submission
$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM loan_officer WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user && $password == $user['password']) {
    // The username and password are correct. Start a session and store the user's ID and username
    session_start();
    $_SESSION['user_id'] = $user['loan_officer_id'];
    $_SESSION['username'] = $user['username'];
    echo json_encode(['success' => true]);
    exit();
} else {
    // The username or password is incorrect. Handle this case as needed.
    echo json_encode(['success' => false]);
}
