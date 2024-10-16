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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('room_id');
            $table->dateTime('check_in_datetime');
            $table->string('first_name');
            $table->string('booking_id');
            $table->string('last_name');
            $table->integer('phone');
            $table->string('email');
            $table->integer('protect_stay_status');
            $table->dateTime('check_out_datetime');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['confirmed', 'cancelled', 'completed']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        
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
