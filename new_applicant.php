<?php require_once '../loan_officer/session.php';
include '../loan_officer/navbar.php'; ?>
<div class="container" style="max-width: 30rem; margin-top:5rem;" id="newApplicantPage">
    <div class="alert alert-success fade show" id="successAlert" role="alert" style="display: none; margin-top: 1rem; border-radius: 5px;">
        <i class="fas fa-check-circle"></i> <strong>Success!</strong> Your Loan Application has been submitted
        successfully.
    </div>
    <div class="card">

        <div class="card-header bg-primary text-white">
            <h2 style="text-align: center;"><i class="fas fa-user-plus"></i> LOAN APPLICATION</h2>
        </div>
        <div class="card-body">
            <p class="text-center">Please fill in the form below to submit your application.</p>
            <style>
                @media (min-width: 992px) {
                    #newApplicantPage {
                        transform: scale(0.9);
                        transform-origin: center;

                    }
                }

                /*alert box*/
                #successAlert {
                    padding: 20px;
                    color: #155724;
                    background-color: #d4edda;
                    border-color: #c3e6cb;
                    border-radius: 0.25rem;
                    margin-bottom: 1rem;
                    transition: opacity 0.15s linear;
                }

                #successAlert strong {
                    color: #155724;
                    font-size: 1.2em;
                }

                #successAlert .btn-close {
                    color: #155724;
                }

                /*end of alert box */

                .input-group-text {
                    border-top-right-radius: 0;
                    border-bottom-right-radius: 0;
                    border-right: 0;
                    width: 40px;
                    /* consistent width */
                }

                .input-group-text i {
                    display: inline-block;
                    height: 32px;
                    line-height: 29px;
                    text-align: center;
                    /* center the icon */
                }

                .form-control {
                    border-top-left-radius: 0;
                    border-bottom-left-radius: 0;
                    height: calc(1.875rem + 1rem);
                    /* consistent height */
                }

                .input-group {
                    margin-bottom: 1rem;
                    /* consistent spacing */
                }

                .btn {
                    margin-top: 1rem;
                    /* consistent spacing */
                }
            </style>
            <form method="post" action="insert_applicant.php" id="loanApplication">
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div><input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" autocomplete="given-name" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div><input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" autocomplete="family-name" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-envelope"></i></span></div><input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="email">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div><input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" required autocomplete="tel" pattern="(\+63|0)[0-9]{10}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
                    </div><input type="text" class="form-control" id="loan_amount" name="loan_amount" placeholder="Loan Amount" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <select class="form-control" id="amortization" name="amortization" required>
                        <option value="" disabled selected>Select Amortization</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Weekly">Weekly</option>
                        <option value="Daily">Daily</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span></div><input type="text" class="form-control" id="address" name="address" placeholder="Address" required autocomplete="address-level1">
                </div><button type="submit" class="btn btn-success btn-lg float-end" style="margin-top: 1rem; width:100%"><i class="fas fa-paper-plane"></i> Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#loanApplication').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'insert_applicant.php',
                data: $(this).serialize(),
                success: function() {
                    $('#successAlert').fadeIn();
                    setTimeout(function() {
                        $('#successAlert').fadeOut(function() {
                            $(this).remove();
                        });
                        $('#loanApplication')[0].reset();
                    }, 3000);
                },

            });
        });
    });
</script>
<?php include '../include/footer.php'; ?>