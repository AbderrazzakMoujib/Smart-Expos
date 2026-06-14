<?php
// DELETE AFTER USE
$root = '/home/smarteve/public_html';

echo '<pre style="background:#111;color:#0f0;padding:20px;font-size:13px;">';

// 1. Verify vendor exists
$sp = $root . '/vendor/maatwebsite/excel/src/ExcelServiceProvider.php';
$facade = $root . '/vendor/maatwebsite/excel/src/Facades/Excel.php';
echo "ServiceProvider: " . (file_exists($sp) ? "EXISTS ✔" : "MISSING ✗") . "\n";
echo "Facade Excel.php: " . (file_exists($facade) ? "EXISTS ✔" : "MISSING ✗") . "\n\n";

// 2. Delete ALL bootstrap cache files
$cacheDir = $root . '/bootstrap/cache/';
$deleted = [];
foreach (glob($cacheDir . '*.php') as $f) {
    unlink($f);
    $deleted[] = basename($f);
}
echo "Deleted cache files:\n";
foreach ($deleted as $d) echo "  ✔ $d\n";
echo "\n";

// 3. Read composer.json of maatwebsite to get provider/alias info
$composerJson = $root . '/vendor/maatwebsite/excel/composer.json';
if (file_exists($composerJson)) {
    $data = json_decode(file_get_contents($composerJson), true);
    $providers = $data['extra']['laravel']['providers'] ?? [];
    $aliases   = $data['extra']['laravel']['aliases'] ?? [];
    echo "Providers in package:\n";
    foreach ($providers as $p) echo "  $p\n";
    echo "Aliases in package:\n";
    foreach ($aliases as $k => $v) echo "  $k => $v\n";
    echo "\n";
}

// 4. Write packages.php manually
$packages = [
    'providers' => [
        'Maatwebsite\\Excel\\ExcelServiceProvider',
    ],
    'aliases' => [
        'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
    ],
];

// Read existing packages.php to merge
$packagesFile = $cacheDir . 'packages.php';
// Build the file content manually
$providersStr = implode("',\n        '", $packages['providers']);
$aliasesStr = '';
foreach ($packages['aliases'] as $k => $v) {
    $aliasesStr .= "        '$k' => '$v',\n";
}

$content = "<?php return array (\n  'providers' => \n  array (\n    0 => '$providersStr',\n  ),\n  'aliases' => \n  array (\n$aliasesStr  ),\n);\n";

// Actually use artisan via bootstrap
define('LARAVEL_START', microtime(true));
require $root . '/vendor/autoload.php';
$app = require_once $root . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

echo "Running package:discover...\n";
$kernel->call('package:discover');
echo $kernel->output();

echo "Running config:clear...\n";
$kernel->call('config:clear');
echo $kernel->output();

// Verify packages.php now has Excel
if (file_exists($packagesFile)) {
    $content = file_get_contents($packagesFile);
    echo "\npackages.php has Excel: " . (strpos($content, 'Excel') !== false ? "YES ✔" : "NO ✗") . "\n";
    echo "packages.php has ExcelServiceProvider: " . (strpos($content, 'ExcelServiceProvider') !== false ? "YES ✔" : "NO ✗") . "\n";
}

echo "\n✔ DONE! Test the dashboard now.\n";
echo "⚠ Delete this file!\n";
echo '</pre>';
