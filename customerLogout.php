<?php
// logout.php

session_start(); 

// Clear all session variables
$_SESSION = array();

// Destroy the session

session_destroy();


header('location: index.php'); 
exit(); // Terminate the script
?>
