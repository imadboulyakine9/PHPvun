<?php
// Configuration settings

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'waf_auth_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// WAF configuration
define('LOGGING_LEVEL', 'high'); // Options: none, low, medium, high
define('BLOCKING_MODE', true); // true to block malicious requests, false to sanitize

// ...other configuration settings...
?>
