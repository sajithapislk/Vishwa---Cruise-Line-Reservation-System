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
        Schema::create('bookeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ur_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ur_id')->references('id')->on('upcoming_reservations');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cruise_deals');
    }
};
