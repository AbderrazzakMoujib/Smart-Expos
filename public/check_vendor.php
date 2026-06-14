<?php
// DELETE AFTER USE
echo '<pre style="background:#111;color:#0f0;padding:20px;font-size:13px;">';

$root = dirname(__DIR__);

echo "Root: $root\n\n";

$checks = [
    'vendor/autoload.php',
    'vendor/maatwebsite/excel/src/ExcelServiceProvider.php',
    'vendor/maatwebsite/excel/src/Facades/Excel.php',
    'bootstrap/cache/packages.php',
    'bootstrap/cache/services.php',
    'bootstrap/cache/config.php',
];

foreach ($checks as $f) {
    $full = $root . '/' . $f;
    $exists = file_exists($full) ? '✔ EXISTS' : '✗ MISSING';
    echo "$exists  —  $f\n";
}

echo "\n--- PHP Info ---\n";
echo "PHP: " . PHP_VERSION . "\n";

// Check if composer available
$composerOut = shell_exec('composer --version 2>&1');
echo "Composer: " . ($composerOut ?: 'NOT FOUND') . "\n";

$phpPath = shell_exec('which php 2>&1');
echo "PHP path: " . ($phpPath ?: 'unknown') . "\n";

echo '</pre>';
echo '<p style="color:orange;">DELETE THIS FILE AFTER READING!</p>';
