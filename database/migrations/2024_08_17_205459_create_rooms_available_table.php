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
        Schema::create('rooms_availables', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id')->nullable();
            $table->integer('room_id')->nullable();  
            $table->integer('no_of_rooms')->nullable();
            $table->decimal('amount', 10, 2)->nullable(); 
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->date('available_date')->nullable();
            $table->string('available_month')->nullable();
            $table->enum('available_status', ['available', 'maintenance', 'unavailable']);
            $table->string('added_by')->nullable();
            $table->timestamps();
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms_available');
    }
};
