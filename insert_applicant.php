<?php
require_once '../loan_officer/session.php';
$host = 'localhost';
$dbname = 'vladlend';
$username = 'root';
$password = '';

try {

    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $loan = $_POST['loan_amount'];
    $amortization = $_POST['amortization'];
    $address = $_POST['address'];

    if (isset($_SESSION['user_id'])) {
        $loan_officer_id = $_SESSION['user_id'];
    } else {
        // Handle the case where the session variable is not set
        echo "Session variable 'loan_officer' is not set.";
    }
    try {

        $stmt = $db->prepare("INSERT INTO lo_borrowers (loan_officer_id, first_name, last_name, email, phone_number, loan_amount, amortization, address) 
                      VALUES (:loan_officer_id, :firstname, :lastname, :email, :phone, :loan, :amortization, :address)");

        $stmt->bindParam(':loan_officer_id', $loan_officer_id);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':loan', $loan);
        $stmt->bindParam(':amortization', $amortization);
        $stmt->bindParam(':address', $address);
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        header("Location: new_applicant.php?error=" . urlencode($e->getMessage()));
    }
}
