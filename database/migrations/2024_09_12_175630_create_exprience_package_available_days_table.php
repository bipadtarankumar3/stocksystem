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
        Schema::create('exprience_package_available_days', function (Blueprint $table) {
            $table->id();
            $table->integer('exprience_package_id')->nullable();
            $table->decimal('exprience_package_amount', 10, 2)->nullable();
            $table->date('exprience_package_available_date')->nullable();
            $table->string('exprience_package_available_month')->nullable();
            $table->enum('exprience_package_available_status', ['available', 'maintenance', 'unavailable']);
            $table->string('exprience_package_added_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exprience_package_available_days');
    }
};
