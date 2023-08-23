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
        Schema::create('cruise_deals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ud_id');
            $table->unsignedBigInteger('ar_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('status');
            $table->double('price',8,2);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ud_id')->references('id')->on('upcoming_deals');
            $table->foreign('ar_id')->references('id')->on('available_rooms');
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
