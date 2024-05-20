<?php
session_start(); // Start the session if it's not already started

// Check if the user is not logged in
if (!isset($_SESSION['admin_id'])) {
    // Redirect to the login page
    header('Location: ../admin/login.php');
    exit();
}
