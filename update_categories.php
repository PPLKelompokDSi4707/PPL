<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

DB::table('destinations')->get()->each(function($dest) {
    $cat = rand(0, 1) ? 'darat' : 'laut';
    $status = ['ramah_lingkungan', 'waspada', 'bahaya'][rand(0, 2)];
    DB::table('destinations')->where('id', $dest->id)->update([
        'category' => $cat,
        'environment_status' => $status
    ]);
});
echo "Updated!";
