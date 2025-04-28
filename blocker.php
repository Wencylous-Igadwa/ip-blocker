<?php
$ip = $_SERVER['REMOTE_ADDR'];
$blockedIpsFile = 'blocked_ips.txt';

// Read blocked IPs
$blockedIps = file_exists($blockedIpsFile) ? file($blockedIpsFile, FILE_IGNORE_NEW_LINES) : [];

// If IP already blocked, deny access
if (in_array($ip, $blockedIps)) {
    echo "<h1>Access Denied</h1><p>You have already claimed your gift.</p>";
    exit;
}

// If blocking request is made
if (isset($_GET['block'])) {
    file_put_contents($blockedIpsFile, $ip . PHP_EOL, FILE_APPEND);
    exit;
}
?>
