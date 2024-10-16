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
        Schema::create('hotel_saraundings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hotel_id');
            $table->string('type')->nullable();;               
            $table->string('name')->nullable();;               
            $table->string('content')->nullable();;
            $table->string('distance')->nullable();;
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_saraundings');
    }
};
