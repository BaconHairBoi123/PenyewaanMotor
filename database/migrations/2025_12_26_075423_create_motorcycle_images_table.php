<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('motorcycle_images', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel motorcycles
            $table->foreignId('motorcycle_id')
                  ->constrained('motorcycles')
                  ->onDelete('cascade'); 
            
            $table->string('image_path'); // Nama file atau path foto
            $table->boolean('is_primary')->default(false); // Opsional: untuk menandai foto utama
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('motorcycle_images');
    }
};