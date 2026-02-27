<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');  // เปลี่ยนเป็น username ของคุณ
define('DB_PASS', '');      // เปลี่ยนเป็น password ของคุณ
define('DB_NAME', 'cactus shop');

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to UTF-8MB4 (รองรับภาษาไทยและ emoji)
mysqli_set_charset($conn, "utf8mb4");

// Start session with security settings
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // เปลี่ยนเป็น 1 ถ้าใช้ HTTPS
session_start();

// Security headers
header('Content-Type: text/html; charset=UTF-8');
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");
?>