<?php require_once '../loan_officer/session.php';
include '../include/header.php'; ?>
<style>
.navbar {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.navbar-brand {
    font-weight: bold;
}

.navbar-nav .nav-link {
    margin-right: 1rem;
    transition: color 0.3s ease;
}

.navbar .navbar-nav li.nav-item a.nav-link:hover {
    color: #183E68;
}

.navbar-nav .nav-link:visited {
    color: #414150;
}

.navbar-nav .nav-item:last-child .nav-link {
    margin-right: 0;
}

.navbar-nav .nav-link .fa {
    margin-right: 0.5rem;
}

@media (max-width: 768px) {
    .nav-link {
        font-size: 1.080em;
        /* Increase the font size */
    }

    #navlink {
        width: 388px;
        align-items: center;
    }

    .nav-link .fa {
        font-size: 1.2em;
        /* Increase the icon size */
    }
}
</style>
<script>
document.addEventListener('click', function(event) {
    var isClickInside = document.querySelector('.navbar').contains(event.target);
    var navbarToggler = document.querySelector('.navbar-toggler');
    var navbarCollapse = document.querySelector('#collapsibleNavbar');

    if (!isClickInside && navbarToggler.getAttribute('aria-expanded') == 'true') {
        navbarToggler.classList.add('collapsed');
        navbarToggler.setAttribute('aria-expanded', 'false');
        navbarCollapse.classList.remove('show');
    }
});
</script>
<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Vlad Lend</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../loan_officer/new_applicant.php"><i class="fa fa-users"></i>
                        Loan Application</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-credit-card"></i> Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-table"></i> Amortization</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-chart-line"></i> Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-cogs"></i> Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-user"></i> Profile</a>
                </li>
                <li>
                    <a id="navlink" class="nav-link d-flex align-items-center" href="#"
                        style="color: #FFFFFF; background-color: #5bc0de; border-radius: 3px; padding: 5px 15px;"
                        onclick="toggleLoginLogout()">
                        <i id="icon"
                            class="fa <?php echo isset($_SESSION['username']) ? 'fa-sign-out-alt' : 'fa-sign-in-alt'; ?>"></i>
                        <span id="loginText">
                            <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Login'; ?>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
function toggleLoginLogout() {
    <?php if (isset($_SESSION['username'])) : ?>
    // If user is logged in, confirm logout
    if (confirm("Are you sure you want to logout?")) {
        window.location.href = "../loan_officer/logout.php";
    }
    <?php else : ?>
    // If user is not logged in, redirect to login page
    window.location.href = "../loan_officer/login.php";
    <?php endif; ?>
}
</script>
<?php include '../include/footer.php'; ?>