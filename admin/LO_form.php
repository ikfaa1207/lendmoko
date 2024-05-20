<?php include '../include/header.php'; ?>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vladlend";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Fetch existing loan officers from the database
$loan_officers = mysqli_query($conn, "SELECT * FROM loan_officer");
$sql = "SELECT * FROM loan_officer WHERE IsDeleted != 1";
?>

<div class="container mt-5">
    <h1 class="mb-4">ADD LOAN OFFICER</h1>
    <form method="post" action="../admin/create_LO.php">
        <div class="row">
            <div class="col-sm">
                <label for="fullname" class="form-label">Full Name:</label>
                <input type="text" id="fullname" name="fullname" class="form-control" required>
            </div>
            <div class="col-md">
                <label for="phone" class="form-label">Phone Number:</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="col-md">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="col-sm">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="username" maxlength="7" class="form-control" required>
            </div>
            <div class="col-sm">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" maxlength="7" class="form-control" required>
            </div>
            <div class="col-md">
                <label for="status" class="form-label">Assign Location:</label>
                <select id="status" name="status" class="form-select" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
        <input type="submit" value="Create Loan Officer" style="margin-top: 1rem;" class="btn btn-primary">
    </form>

</div>
<?php
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo '<div class="container mt-5">
        <h1 class="mb-4">Manage Existing Loan Officers</h1>
        <table class="table">
            <thead>
                <tr>
                    <th class="d-none d-md-table-cell" scope="col">Username</th>
                    <th scope="col">Full Name</th>
                    <th class="d-none d-md-table-cell" scope="col">Email</th>
                    <th class="d-none d-md-table-cell" scope="col">Phone Number</th>
                    <th class="d-none d-md-table-cell" scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>
            <td class="d-none d-md-table-cell">' . $row['username'] . '</td>
            <td>' . $row['full_name'] . '</td>
            <td class="d-none d-md-table-cell">' . $row['email'] . '</td>
            <td class="d-none d-md-table-cell">' . $row['phone_number'] . '</td>
            <td class="d-none d-md-table-cell">' . $row['status'] . '</td>
            <td>
                <a href="edit_LO.php?id=' . $row['loan_officer_id'] . '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <a href="deactivate_LO.php?id=' . $row['loan_officer_id'] . '" class="btn btn-warning btn-sm"><i class="fas fa-user-slash"></i> Deactivate</a>
                <a href="delete_LO.php?id=' . $row['loan_officer_id'] . '" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                <a href="delete_permanently.php?id=' . $row['loan_officer_id'] . '" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete Permanently</a>
            </td>
        </tr>';
    }

    echo '</tbody>
        </table>
    </div>';
} else {
    echo '<div class="container mt-5">
            <h1 class="mb-4">Manage Existing Loan Officers</h1>
            <p>No results</p>
        </div>';
}
?>
<?php include '../include/footer.php'; ?>