<?php
// Fix FILESYSTEM_DISK in .env
$envPath = dirname(__DIR__) . '/.env';
$content = file_get_contents($envPath);

if (strpos($content, 'FILESYSTEM_DISK=local') !== false) {
    $content = str_replace('FILESYSTEM_DISK=local', 'FILESYSTEM_DISK=public', $content);
    file_put_contents($envPath, $content);
    echo 'OK — FILESYSTEM_DISK changed to public. Delete this file now.';
} elseif (strpos($content, 'FILESYSTEM_DISK=public') !== false) {
    echo 'Already set to public — no change needed. Delete this file now.';
} else {
    echo 'FILESYSTEM_DISK not found in .env';
}

// Clear config cache
@unlink(dirname(__DIR__) . '/bootstrap/cache/config.php');
echo '<br>Config cache cleared.';
