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
        Schema::table('user_verifications', function (Blueprint $table) {
            // Add verification_type column
            $table->enum('verification_type', ['sim', 'course', 'unverified'])->default('unverified')->after('face_photo_path');
            
            // We cannot easily 'change' an enum column in Laravel without doctrine/dbal and it's tricky.
            // A common workaround is to use raw SQL to modify the column definition.
            // Or, simpler for this project: we can just ensure our code handles the string values.
            // But let's try to update it properly using raw SQL for MySQL.
        });

        // Update status column to include 'pending', 'rejected', 'class_required'
        // Existing: ['unverified', 'verified', 'driving_class']
        // New: ['unverified', 'verified', 'driving_class', 'pending', 'rejected', 'class_required']
        DB::statement("ALTER TABLE user_verifications MODIFY COLUMN status ENUM('unverified', 'verified', 'driving_class', 'pending', 'rejected', 'class_required') DEFAULT 'unverified'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_verifications', function (Blueprint $table) {
            $table->dropColumn('verification_type');
        });

        // Revert status column
        DB::statement("ALTER TABLE user_verifications MODIFY COLUMN status ENUM('unverified', 'verified', 'driving_class') DEFAULT 'unverified'");
    }
};
