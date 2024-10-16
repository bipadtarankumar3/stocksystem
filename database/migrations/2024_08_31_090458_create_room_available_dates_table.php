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
        Schema::create('room_available_dates', function (Blueprint $table) {
            $table->id();
            $table->integer('rad_hotel_id')->nullable();
            $table->integer('rad_room_id')->nullable();               
            $table->decimal('rad_amount', 10, 2)->nullable(); 
            $table->date('rad_available_date')->nullable();
            $table->string('rad_available_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_available_dates');
    }
};
