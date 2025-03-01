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
        Schema::create('upcoming_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('s_id');
            $table->unsignedBigInteger('sr_id');
            $table->unsignedBigInteger('dp_id');
            $table->unsignedBigInteger('ap_id');
            $table->unsignedBigInteger('p_id');
            $table->string('name');
            $table->longText('description');
            $table->string('img');
            $table->double('tax',8,2);
            $table->double('price',8,2);
            $table->dateTime('depart_at');
            $table->dateTime('arrive_at');
            $table->json('booked_rooms')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('s_id')->references('id')->on('cruise_ships');
            $table->foreign('sr_id')->references('id')->on('cruise_ship_rooms');
            $table->foreign('dp_id')->references('id')->on('ports');
            $table->foreign('ap_id')->references('id')->on('ports');
            $table->foreign('p_id')->references('id')->on('packages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upcoming_deals');
    }
};
