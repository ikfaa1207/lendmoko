<?php require_once '../admin/session.php';
include '../admin/navbar.php'; ?>

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

$stmt = $pdo->query('SELECT COUNT(*) FROM lo_borrowers');
$count = $stmt->fetchColumn();
?>
<style>
.badge {
    color: white;
}

.text-center {
    text-align: center;
}

.d-block {
    display: block;
}

.small-box {
    border-radius: 0.45rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    display: block;
    margin-bottom: 1.3rem;
    position: relative;
    background: #17a2b8;
    color: #fff;
    padding: 1.5rem;
    width: 100%;
    height: 140px;
    /* margin-right: 2em; */
    /* margin-left: 1.5em; */

}

.small-box .icon {
    color: rgba(0, 0, 0, 0.14);
    position: absolute;
    top: 0.5rem;
    right: 2rem;
    z-index: 0;
    margin-top: 0.8em;
    /* Add some space above the icon */
}

.small-box-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: #fff;
    display: block;
    padding: 0.5rem;
    position: relative;
    text-align: center;
    text-decoration: none;
    z-index: 10;
}

.small-box .inner p {
    font-size: 19px;
}

.small-box-footer:hover {
    color: #fff;
    background-color: rgba(0, 0, 0, 0.20);
}

.small-box .inner h3 {
    font-size: 2em;
    /* Adjust the size of the h3 text */
    margin: 0;
    /* Remove the margin */
    padding: 0;
    /* Remove the padding */
}

@media screen and (max-width: 480px) {
    .small-box .inner p {
        font-size: 16px;
        padding-top: 10px;
        /* Adjust the font size for Android phones */
    }

    .small-box .inner h3 {
        font-size: 1.7em;
        /* Adjust the size of the h3 text for Android phones */
    }

    .small-box .icon .fas {
        font-size: 2.5em;
        /* Adjust the icon size for Android phones */
    }
}

/*style for bottom info-box with large icon */
.info-box {
    display: flex;
    align-items: center;
    margin: 5px 10px;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.info-box .info-box-icon {
    font-size: 50px;
    width: 80px;
    text-align: center;
    padding-right: 20px;
}

.info-box .info-box-content {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.info-box .info-box-text {
    font-size: 18px;
    font-weight: bold;
}

.info-box .info-box-number {
    font-size: 24px;
    margin: 5px 0;
}

.info-box .progress {
    height: 3px;
    margin: 5px 0;
}

.info-box .progress-description {
    font-size: 14px;
    color: #fff;
}

.bg-gradient-info {
    background: linear-gradient(45deg, #17a2b8, #0C5E6B);
    color: #fff;
}

.bg-gradient-success {
    background: linear-gradient(45deg, #28a745, #185827);
    color: #fff;
}

.bg-gradient-warning {
    background: linear-gradient(45deg, #ff9f43, #ff6f00);
    color: #fff;
}
</style>

<!--main content-->
<div class="main container-fluid">
    <div class="row mx-auto pt-3">
        <div class="col-6 col-lg-3">
            <div class="d-flex">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $count; ?></h3>
                        <p>New Application</p>
                        <div class="icon">
                            <i class="fas fa-file-alt fa-4x"></i> <!-- Changed icon -->
                        </div>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt fa-4x"></i> <!-- Changed icon -->
                    </div>
                    <a href="#" class="small-box-footer position-absolute bottom-0 start-0 end-0">
                        View <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class=" d-flex">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $count; ?></h3>
                        <p>Total Borrowers</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users fa-4x"></i> <!-- Kept the same icon -->
                    </div>
                    <a href="#" class="small-box-footer position-absolute bottom-0 start-0 end-0">
                        View <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mx-auto">
        <div class="col-6 col-lg-3">
            <div class=" d-flex">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $count; ?></h3>
                        <p>New Application</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt fa-4x"></i> <!-- Changed icon -->
                    </div>
                    <a href="#" class="small-box-footer position-absolute bottom-0 start-0 end-0">
                        View <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="d-flex">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo $count; ?></h3>
                        <p>New Application</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt fa-4x"></i> <!-- Changed icon -->
                    </div>
                    <a href="#" class="small-box-footer position-absolute bottom-0 start-0 end-0">
                        View <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!----------------------------------------------------- info box for Amortizatin --------------->
    <div class="col-12 >
        <div class=" row mx-auto">
        <div class="info-box bg-gradient-info mx-auto">
            <i class="far fa-calendar-alt info-box-icon"></i>
            <div class="info-box-content">
                <span class="info-box-text">Monthly</span>
                <span class="info-box-number">41,410</span>
                <div class="progress">
                    <div class="progress-bar bg-info" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                    70% Increase in 30 Days
                </span>
            </div>
        </div>
    </div>
    <div class="row mx-auto">
        <div class="info-box bg-gradient-success mx-auto">
            <i class="far fa-calendar-alt info-box-icon"></i>
            <div class="info-box-content">
                <span class="info-box-text">Weekly</span>
                <span class="info-box-number">41,410</span>
                <div class="progress">
                    <div class="progress-bar bg-info" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                    70% Increase in 30 Days
                </span>
            </div>
        </div>
    </div>
    <div class="row mx-auto">
        <div class="info-box bg-gradient-warning mx-auto">
            <i class="far fa-calendar-alt info-box-icon"></i>
            <div class="info-box-content">
                <span class="info-box-text">Daily</span>
                <span class="info-box-number">41,410</span>
                <div class="progress">
                    <div class="progress-bar bg-info" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                    70% Increase in 30 Days
                </span>
            </div>
        </div>
    </div>
</div>
</div>