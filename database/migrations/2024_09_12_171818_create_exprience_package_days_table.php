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
        Schema::create('exprience_package_days', function (Blueprint $table) {
            $table->id();
            $table->id('exprience_package_id')->nullable();
            $table->text('package_day')->nullable();
            $table->integer('exprience_id')->nullable();
            $table->text('package_day_title')->nullable();
            $table->text('package_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exprience_package_days');
    }
};
