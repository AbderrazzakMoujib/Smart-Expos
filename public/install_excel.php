<?php
// DELETE AFTER USE
$root   = '/home/smarteve/public_html';
$vendor = $root . '/vendor/maatwebsite';
$tar    = __DIR__ . '/maatwebsite.tar.gz';

echo '<pre style="background:#111;color:#0f0;padding:20px;font-size:13px;">';

if (!file_exists($tar)) {
    echo "✗ maatwebsite.tar.gz not found!\n";
    echo '</pre>';
    exit;
}

echo "tar.gz size: " . filesize($tar) . " bytes\n";

// Use PharData (built-in PHP, no shell needed)
try {
    if (!is_dir($vendor)) {
        mkdir($vendor, 0755, true);
        echo "✔ Created vendor/maatwebsite/\n";
    }

    $phar = new PharData($tar);
    $phar->extractTo($vendor, null, true);
    echo "✔ Extracted via PharData\n\n";

    // Verify
    $check = $vendor . '/excel/src/ExcelServiceProvider.php';
    echo "ExcelServiceProvider.php: " . (file_exists($check) ? "EXISTS ✔" : "MISSING ✗") . "\n\n";

    if (file_exists($check)) {
        foreach ([
            $root . '/bootstrap/cache/packages.php',
            $root . '/bootstrap/cache/services.php',
        ] as $f) {
            if (file_exists($f)) {
                unlink($f);
                echo "✔ Deleted " . basename($f) . "\n";
            }
        }
        echo "\n✔ SUCCESS! Test the dashboard now.\n";
    } else {
        echo "Contents of vendor/maatwebsite:\n";
        if (is_dir($vendor)) {
            foreach (scandir($vendor) as $f) {
                if ($f !== '.' && $f !== '..') echo "  $f\n";
            }
        }
    }
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
}

echo "\n⚠ Delete maatwebsite.tar.gz and this file!\n";
echo '</pre>';
