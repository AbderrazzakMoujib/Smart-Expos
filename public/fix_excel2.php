<?php
// DELETE AFTER USE
$root      = '/home/smarteve/public_html';
$cacheDir  = $root . '/bootstrap/cache/';
$installed = $root . '/vendor/composer/installed.json';

echo '<pre style="background:#111;color:#0f0;padding:20px;font-size:13px;">';

// 1. Check installed.json
echo "installed.json exists: " . (file_exists($installed) ? "YES ✔" : "NO ✗") . "\n";

if (file_exists($installed)) {
    $data = json_decode(file_get_contents($installed), true);
    // Laravel 9 format: { "packages": [...] } or flat array
    $packages = isset($data['packages']) ? $data['packages'] : $data;
    $found = false;
    foreach ($packages as $pkg) {
        if (isset($pkg['name']) && $pkg['name'] === 'maatwebsite/excel') {
            $found = true;
            echo "maatwebsite/excel in installed.json: YES ✔\n\n";
            break;
        }
    }
    if (!$found) {
        echo "maatwebsite/excel in installed.json: NO ✗\n";
        echo "→ Need to add it to installed.json\n\n";
    }
}

// 2. Read current packages.php
$packagesFile = $cacheDir . 'packages.php';
if (file_exists($packagesFile)) {
    $current = include $packagesFile;
} else {
    $current = ['providers' => [], 'aliases' => []];
}

echo "Current packages.php providers count: " . count($current['providers'] ?? []) . "\n";
echo "Excel already registered: " . (in_array('Maatwebsite\\Excel\\ExcelServiceProvider', $current['providers'] ?? []) ? "YES ✔" : "NO ✗") . "\n\n";

// 3. Add Excel provider and alias manually to packages.php
$current['providers'][] = 'Maatwebsite\\Excel\\ExcelServiceProvider';
$current['aliases']['Excel'] = 'Maatwebsite\\Excel\\Facades\\Excel';

// Remove duplicates
$current['providers'] = array_unique($current['providers']);

// Write packages.php
$export = var_export($current, true);
$written = file_put_contents($packagesFile, "<?php return $export;\n");
echo "Written packages.php: " . ($written !== false ? "SUCCESS ✔ ($written bytes)" : "FAILED ✗") . "\n\n";

// 4. Verify
if (file_exists($packagesFile)) {
    $verify = include $packagesFile;
    echo "Excel in providers: " . (in_array('Maatwebsite\\Excel\\ExcelServiceProvider', $verify['providers'] ?? []) ? "YES ✔" : "NO ✗") . "\n";
    echo "Excel in aliases: " . (isset($verify['aliases']['Excel']) ? "YES ✔" : "NO ✗") . "\n";
}

// 5. Also add to installed.json so future package:discover works
if (file_exists($installed)) {
    $data = json_decode(file_get_contents($installed), true);
    $isNested = isset($data['packages']);
    $packages = $isNested ? $data['packages'] : $data;

    $alreadyIn = false;
    foreach ($packages as $pkg) {
        if (isset($pkg['name']) && $pkg['name'] === 'maatwebsite/excel') {
            $alreadyIn = true;
            break;
        }
    }

    if (!$alreadyIn) {
        $newEntry = [
            'name' => 'maatwebsite/excel',
            'version' => '3.1.69',
            'extra' => [
                'laravel' => [
                    'providers' => ['Maatwebsite\\Excel\\ExcelServiceProvider'],
                    'aliases'   => ['Excel' => 'Maatwebsite\\Excel\\Facades\\Excel'],
                ]
            ]
        ];
        if ($isNested) {
            $data['packages'][] = $newEntry;
        } else {
            $data[] = $newEntry;
        }
        file_put_contents($installed, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        echo "\n✔ Added maatwebsite/excel to installed.json\n";
    } else {
        echo "\n✔ Already in installed.json\n";
    }
}

echo "\n✔ DONE! Test the dashboard now.\n";
echo "⚠ Delete this file!\n";
echo '</pre>';
