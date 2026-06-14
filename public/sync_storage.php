<?php
$src = dirname(__DIR__) . '/storage/app/public';
$dst = __DIR__ . '/storage';

$copied = 0;
$errors = [];

function copyDir($from, $to) {
    global $copied, $errors;
    if (!is_dir($to)) mkdir($to, 0755, true);
    foreach (scandir($from) as $item) {
        if ($item === '.' || $item === '..') continue;
        $s = $from . '/' . $item;
        $d = $to   . '/' . $item;
        if (is_dir($s)) {
            copyDir($s, $d);
        } else {
            if (!file_exists($d)) {
                if (copy($s, $d)) $copied++;
                else $errors[] = "Failed: $d";
            }
        }
    }
}

copyDir($src, $dst);

echo '<pre>';
echo "Copied: $copied file(s)\n";
if ($errors) echo "Errors:\n" . implode("\n", $errors);
else echo "No errors.";
echo "\n\nDelete this file after use!";
echo '</pre>';
