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
            $table->unsignedBigInteger('b_id');
            $table->string('ref')->nullable();
            $table->string('method')->nullable();
            $table->string('status')->default('REQUESTED');
            $table->double('amount');
            $table->timestamps();
            $table->foreign('b_id')->references('id')->on('bookeds');
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
