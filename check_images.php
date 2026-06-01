<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== MOTORCYCLE IMAGES ===\n";
foreach (App\Models\MotorcycleImage::all() as $img) {
    echo "ID: {$img->id}, MC ID: {$img->motorcycle_id}, Path: {$img->image_path}, Primary: {$img->is_primary}\n";
}
