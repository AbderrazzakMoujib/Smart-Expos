<?php
// DELETE AFTER USE
$vendor = '/home/smarteve/public_html/vendor';

echo '<pre style="background:#111;color:#0f0;padding:20px;font-size:13px;">';

// Test 1: can we write to vendor?
$testDir = $vendor . '/maatwebsite';
if (!is_dir($testDir)) {
    $made = mkdir($testDir, 0755, true);
    echo "mkdir vendor/maatwebsite: " . ($made ? "SUCCESS ✔" : "FAILED ✗") . "\n";
} else {
    echo "vendor/maatwebsite already exists ✔\n";
}

// Test 2: write a test file
$testFile = $testDir . '/test.txt';
$written = file_put_contents($testFile, 'test');
echo "Write test file: " . ($written !== false ? "SUCCESS ✔" : "FAILED ✗") . "\n";

// Test 3: can we extract zip here directly?
$zip = '/home/smarteve/public_html/public/maatwebsite.zip';
echo "\nZip exists: " . (file_exists($zip) ? "YES ✔" : "NO ✗") . "\n";
echo "Zip size: " . (file_exists($zip) ? filesize($zip) . " bytes" : "N/A") . "\n";

// Try extract
$z = new ZipArchive();
if ($z->open($zip) === true) {
    echo "Zip opened: YES ✔\n";
    echo "Zip entries count: " . $z->numFiles . "\n";
    echo "First 3 entries:\n";
    for ($i = 0; $i < min(3, $z->numFiles); $i++) {
        echo "  " . $z->getNameIndex($i) . "\n";
    }
    $z->close();
} else {
    echo "Zip opened: NO ✗\n";
}

echo '</pre>';
