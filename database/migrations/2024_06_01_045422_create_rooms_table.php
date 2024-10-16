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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();               
            $table->integer('room_type')->nullable();               
            $table->text('bed_room')->nullable();
            $table->text('washroom')->nullable();
            $table->text('kitchen')->nullable();
            $table->text('balcony')->nullable();
            $table->text('feature_image')->nullable();
            $table->float('price')->nullable();
            $table->float('no_of_rooms')->nullable();
            $table->float('minimum_day_stay')->nullable();
            $table->float('no_of_beds')->nullable();
            $table->float('room_size')->nullable();
            $table->float('max_adults')->nullable();
            $table->float('max_children')->nullable();
            $table->text('room_amenities')->nullable();
            $table->text('import_url')->nullable();
            $table->string('status')->default('draft');
            $table->string('added_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
