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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->string('serial_no');
            $table->integer('customer_id')->nullable();
            $table->integer('sd_id')->nullable();
            $table->text('courier_to_kolkata')->nullable();
            $table->text('courier')->nullable();
            $table->text('transport')->nullable();
            $table->date('date')->nullable();
            $table->integer('gst')->nullable();
            $table->integer('gst_received')->nullable();
            $table->integer('muthiya_cost')->nullable();
            $table->integer('grand_total')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
