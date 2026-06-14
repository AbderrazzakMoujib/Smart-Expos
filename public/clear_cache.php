<?php
// DELETE THIS FILE AFTER USE
define('LARAVEL_START', microtime(true));
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$commands = [
    'config:clear',
    'cache:clear',
    'view:clear',
    'route:clear',
    'package:discover',
];

echo '<pre>';
foreach ($commands as $cmd) {
    $kernel->call($cmd);
    echo "✔ php artisan {$cmd}\n" . $kernel->output();
}
echo '</pre><p style="color:green;font-weight:bold;">Done! Delete this file now.</p>';
