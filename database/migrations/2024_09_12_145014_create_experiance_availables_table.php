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
        Schema::create('experiance_availables', function (Blueprint $table) {
            $table->id();
            $table->integer('exp_experiance_id')->nullable();
            $table->decimal('exp_amount', 10, 2)->nullable();
            $table->date('exp_available_date')->nullable();
            $table->string('exp_available_month')->nullable();
            $table->enum('exp_available_status', ['available', 'maintenance', 'unavailable']);
            $table->string('exp_added_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiance_availables');
    }
};
