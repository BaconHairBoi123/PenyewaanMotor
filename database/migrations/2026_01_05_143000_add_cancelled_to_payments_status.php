<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add 'cancelled' to the ENUM list for payments table
        // Note: Doctrine DBAL enum support is limited, raw SQL is often safer for ENUM modification in MySQL
        DB::statement("ALTER TABLE payments MODIFY COLUMN status ENUM('pending', 'success', 'failed', 'cancelled') DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back
        // Warning: This could fail if there are 'cancelled' records.
        // Usually we don't strictly revert enums unless necessary, but showing intent here.
        DB::statement("ALTER TABLE payments MODIFY COLUMN status ENUM('pending', 'success', 'failed') DEFAULT 'pending'");
    }
};
