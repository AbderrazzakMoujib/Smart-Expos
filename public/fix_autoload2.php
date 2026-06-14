<?php
// DELETE AFTER USE
$root = '/home/smarteve/public_html';
echo '<pre style="background:#111;color:#0f0;padding:20px;font-size:13px;">';

// 1. Read current psr4 file as text and append our entry
$psr4File = $root . '/vendor/composer/autoload_psr4.php';
$psr4Text = file_get_contents($psr4File);

if (strpos($psr4Text, 'Maatwebsite') === false) {
    // Insert before last );
    $newLine = "    'Maatwebsite\\\\Excel\\\\' => array('" . $root . "/vendor/maatwebsite/excel/src'),\n";
    $psr4Text = str_replace(");\n", $newLine . ");\n", $psr4Text);
    // Handle case without trailing newline
    if (strpos($psr4Text, 'Maatwebsite') === false) {
        $psr4Text = str_replace(");", $newLine . ");", $psr4Text);
    }
    file_put_contents($psr4File, $psr4Text);
    echo "✔ Added to autoload_psr4.php\n";
} else {
    echo "✔ Already in autoload_psr4.php\n";
}

// 2. Read current classmap file as text and append our entries
$classmapFile = $root . '/vendor/composer/autoload_classmap.php';
$classmapText = file_get_contents($classmapFile);

if (strpos($classmapText, 'Maatwebsite') === false) {
    $newLines  = "  'Maatwebsite\\\\Excel\\\\ExcelServiceProvider' => '" . $root . "/vendor/maatwebsite/excel/src/ExcelServiceProvider.php',\n";
    $newLines .= "  'Maatwebsite\\\\Excel\\\\Facades\\\\Excel' => '" . $root . "/vendor/maatwebsite/excel/src/Facades/Excel.php',\n";
    $newLines .= "  'Maatwebsite\\\\Excel\\\\Excel' => '" . $root . "/vendor/maatwebsite/excel/src/Excel.php',\n";
    $classmapText = str_replace(");\n", $newLines . ");\n", $classmapText);
    if (strpos($classmapText, 'Maatwebsite') === false) {
        $classmapText = str_replace(");", $newLines . ");", $classmapText);
    }
    file_put_contents($classmapFile, $classmapText);
    echo "✔ Added to autoload_classmap.php\n";
} else {
    echo "✔ Already in autoload_classmap.php\n";
}

// 3. Verify by searching raw text
$psr4Check     = file_get_contents($psr4File);
$classmapCheck = file_get_contents($classmapFile);
echo "\nVerify psr4 text has Maatwebsite: "    . (strpos($psr4Check, 'Maatwebsite') !== false ? "YES ✔" : "NO ✗") . "\n";
echo "Verify classmap text has Maatwebsite: " . (strpos($classmapCheck, 'Maatwebsite') !== false ? "YES ✔" : "NO ✗") . "\n";

// Show last 3 lines of psr4
$lines = explode("\n", trim($psr4Check));
echo "\nLast 3 lines of autoload_psr4.php:\n";
foreach (array_slice($lines, -3) as $l) echo "  $l\n";

if (function_exists('opcache_reset')) { opcache_reset(); echo "\n✔ OPcache cleared\n"; }

echo "\n✔ DONE! Test the site now.\n";
echo "⚠ Delete this file!\n";
echo '</pre>';
