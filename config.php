<?php
// ========================
// DATABASE CONFIGURATION
// ========================
define('DB_HOST', 'your-database-host');      // e.g., 'localhost' or Render DB URL
define('DB_USER', 'your-database-username');  // e.g., 'root' (XAMPP) or Render DB user
define('DB_PASS', 'your-database-password');  // Leave empty for XAMPP default
define('DB_NAME', 'insurance_portal');        // Must match your database name

// ========================
// EMAIL/SMTP SETTINGS
// ========================
define('SMTP_HOST', 'smtp.your-provider.com'); // e.g., 'smtp.mailtrap.io' for testing
define('SMTP_PORT', 587);                      // 587 for TLS, 465 for SSL
define('SMTP_USER', 'your@email.com');         // SMTP username
define('SMTP_PASS', 'your-email-password');    // SMTP password (use app password for Gmail)
define('FROM_EMAIL', 'no-reply@yourdomain.com');
define('FROM_NAME', 'Insurance Portal');

// ========================
// FILE PATHS
// ========================
define('LOGO_PATH', __DIR__ . '/assets/img/logo.png');
define('PDF_STORAGE_PATH', __DIR__ . '/storage/certificates/');

// ========================
// SECURITY
// ========================
session_start();
define('ADMIN_SESSION_TIMEOUT', 1800); // 30 minutes

// ========================
// ERROR HANDLING
// ========================
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Auto-create storage directory if missing
if (!file_exists(PDF_STORAGE_PATH)) {
    mkdir(PDF_STORAGE_PATH, 0777, true);
}
?>
