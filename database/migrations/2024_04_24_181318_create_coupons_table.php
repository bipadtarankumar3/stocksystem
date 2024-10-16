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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_code');
            $table->string('coupon_name');
            $table->decimal('coupon_amount', 10, 2);
            $table->enum('discount_type', ['flat', 'percentage']);
            $table->string('feature_image')->nullable();
            $table->date('end_date');
            $table->decimal('min_spend', 10, 2)->nullable();
            $table->decimal('max_spend', 10, 2)->nullable();
            $table->boolean('only_for_services')->default(false);
            $table->boolean('only_for_user')->default(false);
            $table->integer('usage_limit_per_coupon')->nullable();
            $table->integer('usage_limit_per_user')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
            $table->softDeletes(); // Adding soft delete column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
