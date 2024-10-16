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
        Schema::create('experiances', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nulllable();
            $table->text('description')->nulllable();
            $table->text('thumbnail')->nulllable();
            $table->decimal('amount', 10, 2);
            $table->string('month')->nulllable();
            $table->string('status')->nulllable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiances');
    }
};
