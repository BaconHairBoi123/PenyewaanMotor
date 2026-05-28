<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            // Hubungkan koordinat ke device yang mengirimnya
            if (!Schema::hasColumn('locations', 'device_id')) {
                $table->foreignId('device_id')->after('id')->constrained('devices')->onDelete('cascade');
            }
            
            // Tambahkan timestamps
            if (!Schema::hasColumn('locations', 'created_at')) {
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeignIdFor('devices');
            $table->dropColumn('device_id');
            $table->dropTimestamps();
        });
    }
};
