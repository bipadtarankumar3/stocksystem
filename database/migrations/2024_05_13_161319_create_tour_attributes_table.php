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
        Schema::create('tour_attributes', function (Blueprint $table) {
            $table->id();
            $table->integer('tour_id');
            $table->string('type')->nullable();               
            $table->integer('attribute_id')->nullable(); 
            $table->string('name')->nullable(); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_attributes');
    }
};
