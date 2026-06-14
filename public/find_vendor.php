<?php
// DELETE AFTER USE
echo '<pre style="background:#111;color:#0f0;padding:20px;font-size:13px;">';

$public = __DIR__;
$root   = dirname(__DIR__);

echo "public dir : $public\n";
echo "root dir   : $root\n\n";

// Check possible vendor locations
$possibleVendors = [
    $root . '/vendor',
    $public . '/vendor',
    dirname($root) . '/vendor',
    '/home/smarteve/vendor',
    '/home/smarteve/public_html/vendor',
];

foreach ($possibleVendors as $v) {
    $exists = is_dir($v) ? 'EXISTS ✔' : 'missing ✗';
    echo "$exists  —  $v\n";
}

echo "\n--- Contents of root ---\n";
$items = scandir($root);
foreach ($items as $item) {
    if ($item === '.' || $item === '..') continue;
    $type = is_dir($root.'/'.$item) ? '[DIR] ' : '[FILE]';
    echo "$type $item\n";
}

echo "\n--- Contents of vendor (first 10) ---\n";
$vendor = $root . '/vendor';
if (is_dir($vendor)) {
    $items = scandir($vendor);
    $i = 0;
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        echo is_dir($vendor.'/'.$item) ? "[DIR] $item\n" : "[FILE] $item\n";
        if (++$i >= 15) { echo "...\n"; break; }
    }
}

echo '</pre>';
