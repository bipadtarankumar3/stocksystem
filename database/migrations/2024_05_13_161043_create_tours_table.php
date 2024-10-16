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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();               
            $table->text('content')->nullable();
            $table->text('category')->nullable();
            $table->text('youtube_video')->nullable();
            $table->float('minimum_advance')->nullable();
            $table->float('duration')->nullable();
            $table->float('min_people')->nullable();
            $table->float('max_people')->nullable();
            $table->text('banner_image')->nullable();
            $table->text('feature_image')->nullable();
            $table->text('location')->nullable();
            $table->text('real_address')->nullable();
            $table->text('map_link')->nullable();
            $table->float('price')->nullable();
            $table->float('sale_price')->nullable();
            $table->string('extra_price')->default('no');
            $table->string('service_fee')->default('no');
            $table->string('fixed_date')->default('no');
            $table->string('open_hours')->default('no');
            $table->string('author_setting')->nullable();
            $table->string('status')->default('draft');
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
        Schema::dropIfExists('tours');
    }
};
