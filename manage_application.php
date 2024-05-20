<?php include '../include/header.php'; ?>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vladlend";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch total loan applications processed
    $stmt = $conn->prepare("SELECT COUNT(*) FROM lo_application WHERE status = 'processed'");
    $stmt->execute();
    $total_processed = $stmt->fetchColumn();

    // Display the metric
    echo '<div class="container mt-5">
    <div class="card text-white  mb-3" style="max-width: 18rem;">
        <div class="card-header bg-warning"><h4>Metric</h4></div>
        <div class="card-body bg-info">
            <h5 class="card-title">Processed Applications</h5>
            <p class="card-text">Total: <?php echo $total_processed; ?></p>
</div>
</div>
</div>';
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
