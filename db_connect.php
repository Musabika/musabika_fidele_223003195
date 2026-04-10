<?php
// Database connection
$host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'hotel_db';

// Create connection
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf-8
$conn->set_charset("utf8");
?>
