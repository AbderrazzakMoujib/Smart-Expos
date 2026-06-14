<?php
// DELETE AFTER USE
$root      = '/home/smarteve/public_html';
$installed = $root . '/vendor/composer/installed.json';
$cacheDir  = $root . '/bootstrap/cache/';

echo '<pre style="background:#111;color:#0f0;padding:20px;font-size:13px;">';

// 1. Remove maatwebsite/excel from installed.json
$data     = json_decode(file_get_contents($installed), true);
$isNested = isset($data['packages']);
$packages = $isNested ? $data['packages'] : $data;

$filtered = array_values(array_filter($packages, function($pkg) {
    return ($pkg['name'] ?? '') !== 'maatwebsite/excel';
}));

if ($isNested) {
    $data['packages'] = $filtered;
} else {
    $data = $filtered;
}

file_put_contents($installed, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
echo "✔ Removed maatwebsite/excel from installed.json\n";

// 2. Delete cache so it rebuilds without Excel
foreach (['packages.php', 'services.php'] as $f) {
    $path = $cacheDir . $f;
    if (file_exists($path)) { unlink($path); echo "✔ Deleted $f\n"; }
}

echo "\n✔ DONE! Visit the site now.\n";
echo "⚠ Delete this file!\n";
echo '</pre>';
