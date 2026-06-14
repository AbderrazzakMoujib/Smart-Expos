<?php
// DELETE AFTER USE
$root = '/home/smarteve/public_html';

echo '<pre style="background:#111;color:#0f0;padding:20px;font-size:13px;">';

$files = [
    'vendor/maatwebsite/excel/src/ExcelServiceProvider.php',
    'vendor/maatwebsite/excel/src/Facades/Excel.php',
    'vendor/maatwebsite/excel/src/Excel.php',
    'vendor/composer/installed.json',
];

foreach ($files as $f) {
    $full = $root . '/' . $f;
    echo (file_exists($full) ? "✔ EXISTS" : "✗ MISSING") . "  $f\n";
}

// Check autoload classmap
$classmap = $root . '/vendor/composer/autoload_classmap.php';
if (file_exists($classmap)) {
    $map = include $classmap;
    $hasExcel = isset($map['Maatwebsite\\Excel\\ExcelServiceProvider']);
    echo "\nautoload_classmap has ExcelServiceProvider: " . ($hasExcel ? "YES ✔" : "NO ✗") . "\n";
}

// Check autoload_psr4
$psr4 = $root . '/vendor/composer/autoload_psr4.php';
if (file_exists($psr4)) {
    $map = include $psr4;
    $hasMaat = isset($map['Maatwebsite\\Excel\\']);
    echo "autoload_psr4 has Maatwebsite\\Excel\\: " . ($hasMaat ? "YES ✔" : "NO ✗") . "\n";
}

echo '</pre>';
