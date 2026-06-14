<?php
$publicStorage = __DIR__ . '/storage';
$appPublic     = dirname(__DIR__) . '/storage/app/public';

echo '<pre>';

// 1. Check if public/storage exists
echo "public/storage exists: " . (file_exists($publicStorage) ? 'YES' : 'NO') . "\n";
echo "public/storage is symlink: " . (is_link($publicStorage) ? 'YES' : 'NO') . "\n";
if (is_link($publicStorage)) {
    echo "symlink target: " . readlink($publicStorage) . "\n";
}

// 2. List files in storage/app/public
echo "\nstorage/app/public contents:\n";
if (is_dir($appPublic)) {
    $dirs = scandir($appPublic);
    foreach ($dirs as $d) {
        if ($d === '.' || $d === '..') continue;
        $sub = $appPublic . '/' . $d;
        echo "  [$d]\n";
        if (is_dir($sub)) {
            $files = scandir($sub);
            foreach ($files as $f) {
                if ($f === '.' || $f === '..') continue;
                echo "    $f\n";
            }
        }
    }
} else {
    echo "  storage/app/public NOT FOUND\n";
}

// 3. List files in public/storage
echo "\npublic/storage contents:\n";
if (is_dir($publicStorage)) {
    $dirs = scandir($publicStorage);
    foreach ($dirs as $d) {
        if ($d === '.' || $d === '..') continue;
        $sub = $publicStorage . '/' . $d;
        echo "  [$d]\n";
        if (is_dir($sub)) {
            $files = scandir($sub);
            foreach ($files as $f) {
                if ($f === '.' || $f === '..') continue;
                echo "    $f\n";
            }
        }
    }
} else {
    echo "  NOT FOUND\n";
}

echo '</pre>';
