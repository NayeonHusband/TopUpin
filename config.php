<?php
// Correct the DB_HOST
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ecommerce_db');

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

session_start();

// Function to prevent SQL Injection
function sanitize($data) {
    global $conn;
    return mysqli_real_escape_string($conn, $data);
}
?>
