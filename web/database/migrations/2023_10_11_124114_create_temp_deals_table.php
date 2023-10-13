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
        Schema::create('temp_deals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ud_id');
            $table->unsignedBigInteger('payment_id');
            $table->timestamps();
            $table->foreign('ud_id')->references('id')->on('upcoming_deals');
            $table->foreign('payment_id')->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_deals');
    }
};
