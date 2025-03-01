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
        Schema::create('cruise_ships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cc_id');
            $table->unsignedBigInteger('type_id');
            $table->string('name');
            $table->text('description');
            $table->string('img');
            $table->string('style',20);
            $table->string('size',20);
            $table->year('launch_at');
            $table->year('last_refit_at');
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
            $table->foreign('cc_id')->references('id')->on('cruise_companies');
            $table->foreign('type_id')->references('id')->on('cruise_ship_types');
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
