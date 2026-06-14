<?php
// DELETE AFTER USE
$root     = '/home/smarteve/public_html';
$cacheDir = $root . '/bootstrap/cache/';

echo '<pre style="background:#111;color:#0f0;padding:20px;font-size:13px;">';

// Delete packages.php and services.php so Laravel rebuilds them fresh
$files = ['packages.php', 'services.php', 'config.php'];
foreach ($files as $f) {
    $path = $cacheDir . $f;
    if (file_exists($path)) {
        unlink($path);
        echo "✔ Deleted $f\n";
    } else {
        echo "- $f not found (ok)\n";
    }
}

echo "\n✔ Cache cleared. Laravel will rebuild packages.php on next request.\n";
echo "Visit the site now — it should work.\n";
echo "⚠ Delete this file!\n";
echo '</pre>';
