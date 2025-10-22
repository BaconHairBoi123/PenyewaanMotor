<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id('id_user'); // PRIMARY KEY AUTO_INCREMENT
            $table->string('name', 100);
            $table->string('username', 50)->unique();
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->text('alamat')->nullable();
            $table->string('no_tlpn', 20)->nullable();
            $table->enum('verifikasi', ['belum', 'sudah'])->default('belum');
            // Tambahkan ini agar Laravel bisa menggunakan "Remember Me"
            $table->rememberToken(); 
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
