<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('motorcycle_services', function (Blueprint $table) {

            // HAPUS FOREIGN KEY DULU
            $table->dropForeign(['service_type_id']);

            // HAPUS KOLOM
            $table->dropColumn('service_type_id');
        });
    }

    public function down(): void
    {
        Schema::table('motorcycle_services', function (Blueprint $table) {

            // KALAU DI-ROLLBACK, BALIKKAN LAGI
            $table->foreignId('service_type_id')
                  ->constrained('service_types')
                  ->onDelete('cascade');
        });
    }
};
