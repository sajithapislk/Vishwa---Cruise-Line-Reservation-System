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
        Schema::create('upcoming_deals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('s_id');
            $table->unsignedBigInteger('dp_id');
            $table->unsignedBigInteger('p_id');
            $table->string('name');
            $table->longText('description');
            $table->string('img');
            $table->integer('tax');
            $table->dateTime('depart_at');
            $table->dateTime('arrive_at');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('s_id')->references('id')->on('ships');
            $table->foreign('dp_id')->references('id')->on('departure_ports');
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
