<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('license_photo_path', 255)->nullable();
            $table->string('face_photo_path', 255)->nullable();
            $table->enum('status', ['unverified', 'verified', 'driving_class'])->default('unverified');
            $table->timestamp('verification_date')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_verifications');
    }
};