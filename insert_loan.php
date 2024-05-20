<?php
// Include config.php to get the PDO connection
require_once '../include/config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $service_name = $_POST['service_name'];
    $interest_rate = $_POST['interest_rate'];
    $term = $_POST['term'];
    $eligibility_criteria = $_POST['eligibility_criteria'];

    try {
        // Prepare an insert statement
        $sql = "INSERT INTO loan_service (service_name, interest_rate, term, eligibility_criteria) VALUES (:service_name, :interest_rate, :term, :eligibility_criteria)";

        $stmt = $db->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':service_name', $service_name);
        $stmt->bindParam(':interest_rate', $interest_rate);
        $stmt->bindParam(':term', $term);
        $stmt->bindParam(':eligibility_criteria', $eligibility_criteria);

        // Execute the prepared statement
        $stmt->execute();

        // Redirect to the loan_service.php page with a success message
        header("Location: loan_service.php?success=1");
    } catch (PDOException $e) {
        // Redirect to the loan_service.php page with an error message
        header("Location: loan_service.php?error=" . urlencode($e->getMessage()));
    }
}
