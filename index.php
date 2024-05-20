<?php
require_once '../loan_officer/session.php';
include '../loan_officer/navbar.php'; ?>
<div class="main">

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        View
    </button>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Loan Application</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../include/footer.php'; ?>