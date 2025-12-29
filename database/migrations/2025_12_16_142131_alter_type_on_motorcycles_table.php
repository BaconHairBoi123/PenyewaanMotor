<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // ubah kolom type jadi ENUM
        DB::statement("
            ALTER TABLE motorcycles 
            MODIFY type ENUM('Small_Matic', 'Big_Matic', 'Manual') 
            NOT NULL
        ");
    }

    public function down(): void
    {
        // rollback ke string biasa
        Schema::table('motorcycles', function (Blueprint $table) {
            $table->string('type')->change();
        });
    }
};
