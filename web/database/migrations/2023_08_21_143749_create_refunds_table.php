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
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cd_id');
            $table->string('ref')->nullable();
            $table->string('method')->nullable();
            $table->string('status')->default('REQUESTED');
            $table->double('amount');
            $table->timestamps();
            $table->foreign('cd_id')->references('id')->on('cruise_deals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};
