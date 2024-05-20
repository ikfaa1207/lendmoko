<?php include '../include/header.php'; ?>
<div class="container">
    <h2>Loan Service</h2>
    <p>Please fill in the form below to add a new loan service.</p>
    <form action="insert_loan.php" method="post">
        <div class="form-group">
            <label for="service_name">Service Name:</label>
            <input type="text" id="service_name" name="service_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="interest_rate">Interest Rate:</label>
            <input type="text" id="interest_rate" name="interest_rate" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="term">Term:</label>
            <select id="term" name="term" class="form-control" required>
                <option value="monthly">Monthly</option>
                <option value="weekly">Weekly</option>
                <option value="daily">Daily</option>
            </select>
        </div>
        <div class="form-group">
            <label for="eligibility_criteria">Eligibility Criteria:</label>
            <textarea id="eligibility_criteria" name="eligibility_criteria" class="form-control" required></textarea>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
<?php include '../include/footer.php'; ?>