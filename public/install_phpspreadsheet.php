<?php
// DELETE AFTER USE
$root   = '/home/smarteve/public_html';
$tar    = __DIR__ . '/phpspreadsheet.tar.gz';
$dest   = $root . '/vendor/phpoffice';

echo '<pre style="background:#111;color:#0f0;padding:20px;font-size:13px;">';

if (!file_exists($tar)) {
    echo "✗ phpspreadsheet.tar.gz not found!\n";
    echo '</pre>'; exit;
}

echo "tar.gz size: " . filesize($tar) . " bytes\n";

if (!is_dir($dest)) mkdir($dest, 0755, true);

try {
    $phar = new PharData($tar);
    $phar->extractTo($dest, null, true);
    echo "✔ Extracted via PharData\n\n";

    $check = $dest . '/phpspreadsheet/src/PhpSpreadsheet/Reader/Csv.php';
    echo "Reader/Csv.php: " . (file_exists($check) ? "EXISTS ✔" : "MISSING ✗") . "\n";

    if (file_exists($check)) {
        echo "\n✔ SUCCESS!\n";
    } else {
        echo "\nContents of vendor/phpoffice:\n";
        foreach (scandir($dest) as $f) {
            if ($f !== '.' && $f !== '..') echo "  $f\n";
        }
    }
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
}

echo "\n⚠ Delete phpspreadsheet.tar.gz and this file!\n";
echo '</pre>';
