<?php
// Include WAF configuration and functions
include 'waf_config.php';
include 'waf.php';

// Test cases for SQL injection payloads
$test_cases = array(
    "' OR '1'='1",
    "UNION SELECT username, password FROM users",
    "SELECT * FROM users WHERE username = 'admin' --",
    "DROP TABLE users",
    "INSERT INTO users (username, password) VALUES ('test', 'test')"
);

foreach ($test_cases as $test) {
    echo "Testing payload: $test\n";
    if (waf_filter($test, $waf_rules)) {
        echo "Blocked: $test\n";
    } else {
        echo "Allowed: $test\n";
    }
    echo "\n";
}
?>
