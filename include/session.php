<?php
// Start the session
session_start();

$cookieParams = session_get_cookie_params();
session_set_cookie_params(
    $cookieParams['lifetime'],
    $cookieParams['path'],
    $cookieParams['domain'],
    true, // Set secure flag
    true // Set httponly flag to prevent client-side script access
);

// Regenerate session ID to prevent session fixation attacks
if (!isset($_SESSION['created'])) {
    session_regenerate_id(true);
    $_SESSION['created'] = time();
} elseif (time() - $_SESSION['created'] > 1800) {
    // session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    $_SESSION['created'] = time();  // update creation time
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Check user agent
if (isset($_SESSION['user_agent']) && $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
    // User agent has changed - possible session hijack
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header("Location: login.php");
    exit();
}
$_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];

// Check if the session has expired and destroy it if necessary
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
    // if the user has no activity within 30 minutes(1800seconds) or the last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header("Location: login.php");
    exit();
}
// Update the last activity time for the current session
$_SESSION['last_activity'] = time();
