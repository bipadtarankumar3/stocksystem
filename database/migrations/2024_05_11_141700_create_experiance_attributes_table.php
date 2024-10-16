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
        Schema::create('experiance_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('attribute_type')->nullable();
            $table->text('attribute_name')->nullable();
            $table->string('icon_class')->nullable();
            $table->string('hide_detail_service')->nullable();
            $table->string('hide_filter_serch')->nullable();
            $table->string('status')->nullable();
            $table->string('added_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiance_attributes');
    }
};
