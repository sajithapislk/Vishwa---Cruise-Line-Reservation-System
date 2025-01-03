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
            $table->unsignedBigInteger('ur_id');
            $table->unsignedBigInteger('payment_id');
            $table->json('selected_rooms');
            $table->timestamps();
            $table->foreign('ur_id')->references('id')->on('upcoming_reservations');
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
