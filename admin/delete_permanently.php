<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vladlend";

// Get the loan officer ID from the URL
$id = $_GET['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start transaction
$conn->begin_transaction();

try {
    // An associative array of all the tables that have a foreign key constraint referencing the loan_officer table
    $tables = [
        'borrowers' => 'borrower_id',
        'lo_messages' => ['recipient_id', 'sender_id'],
        'lo_application' => 'application_id',
        'lo_settings' => 'loan_officer_id',
        'lo_reports' => 'loan_officer_id',
        'documents' => 'application_id',
        'loan_application' => 'loan_officer_id',
        'task' => 'assigned_to',
        'lo_documents' => 'loan_officer_id',
        'location' => 'location_id',
        'lo_location' => 'location_id',
        'lo_borrowers' => 'loan_officer_id',
        'loan_officer' => 'loan_officer_id',
    ];

    foreach ($tables as $table => $foreignKey) {
        if (is_array($foreignKey)) {
            foreach ($foreignKey as $key) {
                $sql = "DELETE FROM $table WHERE $key = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $id);
                $stmt->execute();
                if ($stmt->error) {
                    throw new Exception("Error in $table for $key: " . $stmt->error);
                }
                $stmt->close();
            }
        } else {
            $sql = "DELETE FROM $table WHERE $foreignKey = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            if ($stmt->error) {
                throw new Exception("Error in $table: " . $stmt->error);
            }
            $stmt->close();
        }
    }


    // Commit transaction
    $conn->commit();
    echo "Loan officer deleted successfully";
    header('Location:../admin/LO_form.php');
} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    echo "Failed to delete loan officer: " . $e->getMessage();
}

// Close connection
$conn->close();
