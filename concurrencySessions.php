<?php
// Set the session save path
session_save_path('C:/xampp/htdocs/Practice/sessions');

session_start();

$maxSessions = 3; // Maximum number of concurrent sessions allowed for a user

if (!isset($_SESSION['session_count'])) {
    $_SESSION['session_count'] = 1;
} else {
    $_SESSION['session_count']++;

    if ($_SESSION['session_count'] > $maxSessions) {
        session_unset();
        session_destroy();
        echo "Maximum session limit exceeded. Please log in again.";
        exit;
    }
}
echo "Session active. Session count: " . $_SESSION['session_count'];

?>
