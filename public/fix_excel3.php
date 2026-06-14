<?php
// DELETE AFTER USE
$root     = '/home/smarteve/public_html';
$cacheDir = $root . '/bootstrap/cache/';

echo '<pre style="background:#111;color:#0f0;padding:20px;font-size:13px;">';

// Read current packages.php to get existing providers
$packagesFile = $cacheDir . 'packages.php';
$current = file_exists($packagesFile) ? include $packagesFile : ['providers' => [], 'aliases' => []];

// Add Excel if not already there
$providers = $current['providers'] ?? [];
if (!in_array('Maatwebsite\\Excel\\ExcelServiceProvider', $providers)) {
    $providers[] = 'Maatwebsite\\Excel\\ExcelServiceProvider';
}
$aliases = $current['aliases'] ?? [];
$aliases['Excel'] = 'Maatwebsite\\Excel\\Facades\\Excel';

// Show what we have
echo "Providers to write (" . count($providers) . "):\n";
foreach ($providers as $p) echo "  $p\n";
echo "\nAliases:\n";
foreach ($aliases as $k => $v) echo "  $k => $v\n";
echo "\n";

// Build providers PHP string
$provStr = '';
foreach ($providers as $i => $p) {
    $provStr .= "    $i => '$p',\n";
}

// Build aliases PHP string
$aliasStr = '';
foreach ($aliases as $k => $v) {
    $aliasStr .= "    '$k' => '$v',\n";
}

// Write the file manually (avoid var_export backslash issues)
$php = "<?php\nreturn array(\n  'providers' => array(\n$provStr  ),\n  'aliases' => array(\n$aliasStr  ),\n);\n";

$written = file_put_contents($packagesFile, $php);
echo "Written packages.php: " . ($written !== false ? "SUCCESS ✔ ($written bytes)" : "FAILED ✗") . "\n\n";

// Show raw file content
echo "--- Raw packages.php ---\n";
echo htmlspecialchars(file_get_contents($packagesFile));
echo "\n--- End ---\n\n";

// Final verify by re-including
$verify = include $packagesFile;
echo "Excel in providers: " . (in_array('Maatwebsite\\Excel\\ExcelServiceProvider', $verify['providers'] ?? []) ? "YES ✔" : "NO ✗") . "\n";
echo "Excel in aliases:   " . (isset($verify['aliases']['Excel']) ? "YES ✔" : "NO ✗") . "\n";

echo "\n✔ DONE! Test the dashboard now.\n";
echo "⚠ Delete this file!\n";
echo '</pre>';
