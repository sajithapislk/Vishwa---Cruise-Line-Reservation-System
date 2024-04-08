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
        Schema::create('cruise_company_wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cc_id');
            $table->unsignedBigInteger('ref')->nullable();
            $table->string('name');
            $table->double('debit',8,2)->nullable();
            $table->double('credit',8,2)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cc_id')->references('id')->on('cruise_companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cruise_line_wallets');
    }
};
