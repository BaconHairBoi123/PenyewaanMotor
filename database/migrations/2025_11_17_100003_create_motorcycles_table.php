<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('motorcycles', function (Blueprint $table) {
            $table->id(); // Default primary key
            $table->string('category', 50)->nullable();
            $table->string('brand', 50)->nullable();
            $table->string('type', 50)->nullable();
            $table->integer('cc')->nullable();
            $table->string('fuel_configuration', 50)->nullable();
            $table->enum('status', ['available', 'rented', 'service'])->default('available');
            $table->text('description')->nullable();
            $table->string('image_path', 255)->nullable();
            $table->date('last_service_date')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('license_plate', 20)->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('motorcycles');
    }
};