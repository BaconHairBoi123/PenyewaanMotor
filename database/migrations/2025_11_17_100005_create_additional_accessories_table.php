<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('additional_accessories', function (Blueprint $table) {
            $table->id(); // id_aksesoris
            $table->string('accessory_name', 100);
            $table->decimal('daily_price', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('additional_accessories');
    }
};