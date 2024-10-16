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
        Schema::create('package_carries', function (Blueprint $table) {
            $table->id();
            $table->integer('carry_exprience_package_id')->nullable();
            $table->text('carry_title')->nullable();
            $table->text('carry_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_carries');
    }
};
