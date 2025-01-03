<?php

function inspect_request() {
    foreach ($_GET as $key => $value) {
        if (is_malicious($value)) {
            die("Malicious query parameter detected: $key");
        }
    }

    foreach ($_POST as $key => $value) {
        if (is_malicious($value)) {
            die("Malicious POST data detected: $key");
        }
    }

    // Capture and inspect headers
    /*
    foreach (getallheaders() as $key => $value) {
        if (is_malicious($value)) {
            die("Malicious header detected: $key");
        }
    }
    */
}

function is_malicious($value) {
    
 }


?>

<form action="foo.php" method="post">
    Name:  <input type="text" name="username" /><br />
    Email: <input type="text" name="email" /><br />
    <input type="submit" name="submit" value="Submit me!" />
</form>