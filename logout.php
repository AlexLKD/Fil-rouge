<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect back to the login page or any other desired page
header('Location: login.php');
exit();
