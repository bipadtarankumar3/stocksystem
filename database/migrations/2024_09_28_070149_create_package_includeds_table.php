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
        Schema::create('package_includeds', function (Blueprint $table) {
            $table->id();
            $table->integer('in_exprience_package_id')->nullable();
            $table->text('in_title')->nullable();
            $table->text('in_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_includeds');
    }
};
