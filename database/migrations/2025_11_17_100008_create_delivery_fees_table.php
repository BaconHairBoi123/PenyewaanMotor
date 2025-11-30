<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Asumsi: Anda perlu menentukan nama kelas migrasi untuk tabel 'locations' di sini.
// Biasanya, nama kelas migrasi adalah 'CreateNamaTabelTable'.
use App\Http\Migrations\CreateLocationsTable; // Ganti path ini jika diperlukan

return new class extends Migration
{
    // public function after(): array { ... } <-- Hapus ini
    
    public function up(): void
    {
        Schema::create('delivery_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade'); 
            $table->double('distance');
            $table->decimal('fee', 10, 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delivery_fees');
    }
};