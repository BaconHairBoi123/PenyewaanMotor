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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('motorcycle_id')->constrained('motorcycles')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration_days');
            $table->enum('delivery_type', ['pickup', 'delivery']);
            $table->decimal('delivery_fee', 15, 2)->default(0);
            $table->decimal('base_price', 15, 2);
            $table->decimal('total_price', 15, 2);
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'cancelled'])->default('pending');
            $table->string('snap_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
