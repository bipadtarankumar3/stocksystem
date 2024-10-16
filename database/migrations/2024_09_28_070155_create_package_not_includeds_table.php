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
        Schema::create('package_not_includeds', function (Blueprint $table) {
            $table->id();
            $table->integer('in_not_exprience_package_id')->nullable();
            $table->text('in_not_title')->nullable();
            $table->text('in_not_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_not_includeds');
    }
};
