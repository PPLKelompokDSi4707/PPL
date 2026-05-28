<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$codes = ['31.71.03.1001', '31.71.01.1001', '31.71.04.1001', '51.03.01.2001', '32.01.01.2001', '32.73.01.1001'];
$destinations = \App\Models\Destination::all();
foreach($destinations as $d) {
    $d->bmkg_adm4 = \Illuminate\Support\Arr::random($codes);
    $d->save();
}
echo "Populated " . count($destinations) . " destinations with BMKG codes.\n";
