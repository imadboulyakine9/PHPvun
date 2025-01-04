<?php
// Include WAF configuration
include 'waf_config.php';

function log_attack($type, $details) {
    $logfile = __DIR__ . '/logs/attacks.log';
    $timestamp = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];
    $uri = $_SERVER['REQUEST_URI'];
    $log_entry = "[$timestamp] [$ip] [$uri] [$type] $details\n";
    file_put_contents($logfile, $log_entry, FILE_APPEND);
}

function inspect_request() {
    global $waf_rules; // Ensure $waf_rules is accessible
    foreach ($_GET as $key => $value) {
        if (waf_filter($value, $waf_rules)) {
            log_attack('GET', "Malicious query parameter detected: $key");
            handle_malicious_request($value);
        }
    }

    foreach ($_POST as $key => $value) {
        if (waf_filter($value, $waf_rules)) {
            log_attack('POST', "Malicious POST data detected: $key");
            handle_malicious_request($value);
        }
    }

    // Capture and inspect headers
    /*
    foreach (getallheaders() as $key => $value) {
        if (waf_filter($value, $waf_rules)) {
            log_attack('HEADER', "Malicious header detected: $key");
            handle_malicious_request($value);
        }
    }
    */
}

function waf_filter($input, $rules) {
    foreach ($rules as $rule) {
        if (preg_match($rule, $input)) {
            log_attack('FILTER', "Matched rule: $rule");
            return true;
        }
    }
    return false;
}

function handle_malicious_request($input) {
    if (BLOCKING_MODE) {
        header('HTTP/1.1 403 Forbidden');
        die("Access denied due to malicious activity.");
    } else {
        // Sanitize input (example for XSS)
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }
}
?>

<form action="foo.php" method="post">
    Name:  <input type="text" name="username" /><br />
    Email: <input type="text" name="email" /><br />
    <input type="submit" name="submit" value="Submit me!" />
</form>