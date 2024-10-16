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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('booking_id');
            $table->decimal('discount_amount', 10, 2);
            $table->decimal('amount', 10, 2);
            $table->string('payment_method'); // e.g., 'credit_card', 'paypal', 'bank_transfer'
            $table->enum('status', ['pending', 'completed', 'failed']);
            $table->timestamp('paid_at')->nullable(); // To store the date and time when the payment was made
            $table->timestamps();

            // Foreign key to link to the bookings table
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
