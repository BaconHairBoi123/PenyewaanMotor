<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('motorcycles', function (Blueprint $table) {
        $table->enum('transmission', ['Manual', 'Automatic'])->default('Manual')->after('brand');
    });
}

public function down()
{
    Schema::table('motorcycles', function (Blueprint $table) {
        $table->dropColumn('transmission');
    });
}

};
