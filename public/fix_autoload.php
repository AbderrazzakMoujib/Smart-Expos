<?php
// DELETE AFTER USE
$root = '/home/smarteve/public_html';

echo '<pre style="background:#111;color:#0f0;padding:20px;font-size:13px;">';

// 1. Fix autoload_psr4.php — add Maatwebsite\Excel\ namespace
$psr4File = $root . '/vendor/composer/autoload_psr4.php';
$psr4 = include $psr4File;

if (!isset($psr4['Maatwebsite\\Excel\\'])) {
    $psr4['Maatwebsite\\Excel\\'] = [$root . '/vendor/maatwebsite/excel/src'];

    // Rebuild file
    $out = "<?php\nreturn array(\n";
    foreach ($psr4 as $ns => $paths) {
        $pathsStr = implode("', '", $paths);
        $out .= "    " . var_export($ns, true) . " => array('" . $pathsStr . "'),\n";
    }
    $out .= ");\n";

    file_put_contents($psr4File, $out);
    echo "✔ Added Maatwebsite\\Excel\\ to autoload_psr4.php\n";
} else {
    echo "✔ Already in autoload_psr4.php\n";
}

// 2. Fix autoload_classmap.php — add PhpOffice classes too if needed
$classmapFile = $root . '/vendor/composer/autoload_classmap.php';
$classmap = include $classmapFile;

$toAdd = [
    'Maatwebsite\\Excel\\ExcelServiceProvider' => $root . '/vendor/maatwebsite/excel/src/ExcelServiceProvider.php',
    'Maatwebsite\\Excel\\Facades\\Excel'        => $root . '/vendor/maatwebsite/excel/src/Facades/Excel.php',
    'Maatwebsite\\Excel\\Excel'                => $root . '/vendor/maatwebsite/excel/src/Excel.php',
];

$added = 0;
foreach ($toAdd as $class => $path) {
    if (!isset($classmap[$class])) {
        $classmap[$class] = $path;
        $added++;
    }
}

if ($added > 0) {
    $out = "<?php\nreturn array(\n";
    foreach ($classmap as $class => $path) {
        $out .= "    " . var_export($class, true) . " => " . var_export($path, true) . ",\n";
    }
    $out .= ");\n";
    file_put_contents($classmapFile, $out);
    echo "✔ Added $added classes to autoload_classmap.php\n";
} else {
    echo "✔ Already in autoload_classmap.php\n";
}

// 3. Verify
$psr4Check = include $psr4File;
$classmapCheck = include $classmapFile;
echo "\nVerify psr4: " . (isset($psr4Check['Maatwebsite\\Excel\\']) ? "YES ✔" : "NO ✗") . "\n";
echo "Verify classmap: " . (isset($classmapCheck['Maatwebsite\\Excel\\ExcelServiceProvider']) ? "YES ✔" : "NO ✗") . "\n";

// 4. Clear opcache if available
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "✔ OPcache cleared\n";
}

echo "\n✔ DONE! Test the site now.\n";
echo "⚠ Delete this file!\n";
echo '</pre>';
