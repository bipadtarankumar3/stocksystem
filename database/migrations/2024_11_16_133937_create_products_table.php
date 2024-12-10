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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('category_id')->nullable();
            $table->text('one_no_cartoon')->nullable();
            $table->text('one_cartoon')->nullable();
            $table->text('two_no_cartoon')->nullable();
            $table->text('two_cartoon')->nullable();
            $table->text('three_no_cartoon')->nullable();
            $table->text('three_cartoon')->nullable();
            $table->integer('uom_id')->nullable();
            $table->integer('min_sale_qty')->nullable();
            $table->integer('uom_qty')->nullable();
            $table->string('ml')->nullable();
            $table->string('product_status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
