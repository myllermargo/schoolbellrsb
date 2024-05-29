<?php
// This is your logout.php script
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_start();
    session_unset(); // Remove all session variables
    session_destroy(); // Destroy the session
    header('Location: index.php'); // Redirect to login page
    exit;
}
?>
