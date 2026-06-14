<?php
// DELETE THIS FILE AFTER USE — SECURITY RISK
set_time_limit(300);

$root = dirname(__DIR__);
$output = [];
$return = 0;

// Try to find composer
$composerPaths = [
    'composer',
    '/usr/local/bin/composer',
    '/usr/bin/composer',
    $root . '/composer.phar',
];

$composer = null;
foreach ($composerPaths as $path) {
    exec("which $path 2>/dev/null", $out, $ret);
    if ($ret === 0 && !empty($out)) {
        $composer = $path;
        break;
    }
    // Try direct call
    exec("$path --version 2>/dev/null", $out2, $ret2);
    if ($ret2 === 0) {
        $composer = $path;
        break;
    }
    $out = []; $out2 = [];
}

echo '<pre style="background:#111;color:#0f0;padding:20px;font-size:13px;">';

if ($composer) {
    echo "✔ Found composer: $composer\n\n";
    echo "Running: composer install --no-dev --optimize-autoloader\n";
    echo str_repeat('-', 60) . "\n";

    $cmd = "cd " . escapeshellarg($root) . " && $composer install --no-dev --optimize-autoloader 2>&1";
    exec($cmd, $output, $return);
    echo implode("\n", $output);
    echo "\n" . str_repeat('-', 60) . "\n";
    echo $return === 0 ? "✔ SUCCESS!\n" : "✗ FAILED (exit code: $return)\n";
} else {
    echo "✗ Composer not found automatically.\n\n";
    echo "PHP version: " . PHP_VERSION . "\n";
    echo "Server: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'unknown') . "\n\n";

    // Try uploading composer.phar manually
    echo "SOLUTION: Upload composer.phar to: $root/\n";
    echo "Download from: https://getcomposer.org/composer.phar\n\n";

    // Check if vendor exists
    $vendorCheck = $root . '/vendor/maatwebsite/excel/src/ExcelServiceProvider.php';
    echo "maatwebsite/excel vendor exists: " . (file_exists($vendorCheck) ? "YES ✔" : "NO ✗") . "\n";

    $autoloadCheck = $root . '/vendor/autoload.php';
    echo "vendor/autoload.php exists: " . (file_exists($autoloadCheck) ? "YES ✔" : "NO ✗") . "\n";
}

echo '</pre>';
echo '<p style="color:orange;font-weight:bold;">⚠ DELETE THIS FILE IMMEDIATELY AFTER USE!</p>';
