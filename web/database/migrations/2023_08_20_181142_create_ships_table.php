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
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cl_id');
            $table->unsignedBigInteger('type_id');
            $table->string('name');
            $table->string('img');
            $table->integer('launch');
            $table->integer('gt');
            $table->double('length');
            $table->double('width');
            $table->integer('speed');
            $table->integer('decks');
            $table->integer('nop');
            $table->integer('no_crew');
            $table->integer('no_cabins');
            $table->integer('wa');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cl_id')->references('id')->on('cruise_lines');
            $table->foreign('type_id')->references('id')->on('ship_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ships');
    }
};
