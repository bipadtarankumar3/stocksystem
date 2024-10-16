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
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();               
            $table->string('content')->nullable();
            $table->text('youtube_video')->nullable();
            $table->text('banner_image')->nullable();
            $table->text('ratings')->nullable();
            $table->text('feature_image')->nullable();
            $table->text('location')->nullable();
            $table->text('real_address')->nullable();
            $table->text('map_link')->nullable();
            $table->text('check_in_time')->nullable();
            $table->text('check_out_time')->nullable();
            $table->text('minimum_advance_reservaction')->nullable();
            $table->text('maximum_day_stay_req')->nullable();
            $table->text('price')->nullable();
            $table->integer('exctera_price')->default(0)->nullable();
            $table->integer('service_fee')->default(0)->nullable();
            $table->string('added_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
