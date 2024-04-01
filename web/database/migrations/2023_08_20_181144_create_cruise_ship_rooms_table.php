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
        Schema::create('cruise_ship_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('s_id');
            $table->string('room_view');
            $table->string('img');
            $table->integer('room_count');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('s_id')->references('id')->on('cruise_ships');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ship_rooms');
    }
};
