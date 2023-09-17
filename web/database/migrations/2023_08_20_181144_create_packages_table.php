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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('s_id');
            $table->string('name');
            $table->boolean('is_d');
            $table->boolean('is_bl');
            $table->boolean('is_en');
            $table->boolean('is_c');
            $table->boolean('is_ona');
            $table->boolean('is_outa');
            $table->boolean('is_kt');
            $table->boolean('is_w');
            $table->boolean('is_s');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('s_id')->references('id')->on('ships');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
