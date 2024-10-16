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
        Schema::create('tour_exprience_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tour_exp_id');
            $table->string('type');
            $table->string('first_name');
            $table->string('traveler');
            $table->string('booking_id');
            $table->string('last_name');
            $table->integer('phone');
            $table->string('email');          
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['confirmed', 'cancelled', 'completed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_exprience_bookings');
    }
};
